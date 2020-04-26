<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostProcesses;
use App\Traits\DynamicDataTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use DynamicDataTrait;

    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $service = new PostProcesses($tag);
        $data = $service->getResponse();
        $layout = $tag ? Tag::layout($tag) : 'blog.roll-layouts.home';
        $baseInfo = [
            'logoText'  => $this->getLogoText(),
            'sections'  => [
                'footer' => $this->getFooterData(),
            ],
        ];
        $data = array_merge($data, $baseInfo);

        return view($layout, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param string  $slug
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showPost(Request $request, $slug)
    {
        $user = \Auth::user();

        // Allow writers to view posts in draft mode and future dates
        if ($user && $user->level() > 2) {
            $post = Post::with('tags')
                            ->bySlug($slug)
                            ->firstOrFail();
        } else {
            $post = Post::with('tags')
                            ->bySlug($slug)
                            ->publishedTimePast()
                            ->isNotDraft()
                            ->firstOrFail();
        }

        $tag = $request->get('tag');

        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        $baseInfo = [
            'logoText'  => $this->getLogoText(),
            'sections'  => [
                'footer' => $this->getFooterData(),
            ],
        ];
        $data = compact('post', 'tag', 'slug');
        $data = array_merge($data, $baseInfo);

        return view($post->layout, $data);
    }

    /**
     * Display a listing of the authors with published content.
     *
     * @return \Illuminate\Http\Response
     */
    public function authors(Request $request)
    {
        $authors = Post::activeAuthors()->get();

        if (!$authors) {
            $authors = [];
        }

        $data = [
            'authors'   => $authors,
            'image'     => config('blog.authors_page_image'),
            'logoText'  => $this->getLogoText(),
            'sections'  => [
                'footer' => $this->getFooterData(),
            ],
        ];

        return view('blog.pages.authors', $data);
    }

    /**
     * Display a listing of an authors published posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function author(Request $request, $author)
    {
        $tag = $request->get('tag');
        $posts = Post::postsByAuthors($author)->get();

        $data = [
            'author'    => $author,
            'image'     => config('blog.author_page_image'),
            'posts'     => $posts,
            'tag'       => $tag,
            'logoText'  => $this->getLogoText(),
            'sections'  => [
                'footer' => $this->getFooterData(),
            ],
        ];

        return view('blog.pages.author', $data);
    }

    /**
     * Get the RSS feed.
     *
     * @param RssFeed $feed
     *
     * @return \Illuminate\Http\Response
     */
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)->header('Content-type', 'application/rss+xml');
    }
}

<?php

namespace App\Services\Sections;

use Illuminate\Http\Request;
use Route;

class BlogSectionService
{
    /**
     * Gets the blog data.
     *
     * @return array  The blog data.
     */
    public function getSectionData()
    {
        return [
            'enabled'       => true,
            'navTitle'      => 'Blog',
            'sectionTitle'  => 'LATEST BLOG POSTS',
            'itemLimit'     => '3',
            'fadeInc'       => '200',
            'seeMoreButton' => [
                'enabled'   => true,
                'link'      => route('blog'),
                'text'      => 'See more',
                'icon'      => 'fa-long-arrow-right',
            ],
            'posts'         => array_slice($this->getBlogPosts(), 0, 3),
            'noPosts'       => 'No Recent Posts',
        ];
    }

    /**
     * Gets the blog posts.
     *
     * @return array The blog posts.
     */
    public function getBlogPosts()
    {
        $blogPostsRequest = Request::create('/api/posts/all/', 'GET');
        $blogPosts = json_decode(Route::dispatch($blogPostsRequest)->getContent());

        return $blogPosts;
    }

}

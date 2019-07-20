<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Services\CmsServices;
use Illuminate\Http\Request;
use Route;

class BlogSectionService extends CmsServices
{
    /**
     * Gets the blog data.
     *
     * @return array  The blog data.
     */
    public function getSectionData()
    {
        $blogSection                    = self::getBlogSection();
        $blogSectionTitleData           = self::getBlogSectionTitle();
        $blogSectionLimit               = self::getBlogSectionLimit()->value;
        $blogSectionSeeMoreButtonData   = self::getBlogSectionSeeMoreButton();
        $blogPosts                      = self::getBlogPosts();
        $blogSectionTitle               = '';
        $blogSectionSeeMoreButton       = '';

        if ($blogSectionTitleData->active) {
            $blogSectionTitle = $blogSectionTitleData->value;
        }

        if (!$blogSectionLimit) {
            $blogSectionLimit = count($blogPosts);
        }

        if ($blogSectionSeeMoreButtonData->active) {
            $blogSectionSeeMoreButton = $blogSectionSeeMoreButtonData->value;
        }

        return [
            'enabled'       => $blogSection->active,
            'navTitle'      => $blogSection->value,
            'sectionTitle'  => $blogSectionTitle,
            'itemLimit'     => $blogSectionLimit,
            'seeMoreButton' => [
                'enabled'   => $blogSectionSeeMoreButtonData->active,
                'link'      => route('blog'),
                'text'      => $blogSectionSeeMoreButton,
                'icon'      => 'fa-long-arrow-right',
            ],
            'posts'         => array_slice($blogPosts, 0, 3),
            'noPosts'       => trans('portfolio.sections.blog.noPosts'),
        ];
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getBlogSection()
    {
        $key = 'cms_blog_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::BlogSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getBlogSectionTitle()
    {
        $key = 'cms_blog_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::BlogSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section post limit the CMS Settings table.
     *
     * @return collection.
     */
    public static function getBlogSectionLimit()
    {
        $key = 'cms_portfolio_blog_limit';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::BlogSectionLimit()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section show more button from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getBlogSectionSeeMoreButton()
    {
        $key = 'cms_blog_section_see_more_button';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::BlogSectionSeeMoreButton()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the blog items.
     *
     * @return array The blog items.
     */
    public static function getBlogPosts()
    {
        $key = 'blog_section_posts';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $items = self::getBlogPostsFromAPI();
        self::storeInCache($key, $items);

        return $items;
    }

    /**
     * Gets the blog posts.
     *
     * @return array The blog posts.
     */
    public static function getBlogPostsFromAPI()
    {
        $blogPostsRequest = Request::create('/api/posts/all/', 'GET');
        $blogPosts = json_decode(Route::dispatch($blogPostsRequest)->getContent());

        return $blogPosts;
    }
}

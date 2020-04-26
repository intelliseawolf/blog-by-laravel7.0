<?php

use App\Models\SocialMediaItem;
use Illuminate\Database\Seeder;

class SocialMediaItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'active'        => 1,
                'name'          => 'GitHub',
                'icon'          => 'fa-github-square',
                'link'          => config('blog.sm.github_url'),
                'sort_order'    => 1,
            ],
            [
                'active'        => 1,
                'name'          => 'FaceBook',
                'icon'          => 'fa-facebook-square',
                'link'          => config('blog.sm.facebook_url'),
                'sort_order'    => 2,
            ],
            [
                'active'        => 1,
                'name'          => 'Twitter',
                'icon'          => 'fa-twitter-square',
                'link'          => config('blog.sm.twitter_url'),
                'sort_order'    => 3,
            ],
            [
                'active'        => 1,
                'name'          => 'LinkedIn',
                'icon'          => 'fa-linkedin-square',
                'link'          => config('blog.sm.linkedin_url'),
                'sort_order'    => 4,
            ],
            [
                'active'        => 1,
                'name'          => 'Instagram',
                'icon'          => 'fa-instagram',
                'link'          => config('blog.sm.instagram_url'),
                'sort_order'    => 5,
            ],
            [
                'active'        => 1,
                'name'          => 'RSS',
                'icon'          => 'fa-rss-square',
                'link'          => route('feeds.blog'),
                'sort_order'    => 6,
            ],
        ];

        foreach ($items as $item) {
            $newSocialMediaItem = SocialMediaItem::where('name', '=', $item['name'])->first();
            if ($newSocialMediaItem === null) {
                $newSocialMediaItem = SocialMediaItem::create([
                    'active'        => $item['active'],
                    'name'          => $item['name'],
                    'icon'          => $item['icon'],
                    'link'          => $item['link'],
                    'sort_order'    => $item['sort_order'],
                ]);
            }
        }
    }
}

<?php

namespace App\Services\Sections;

class FooterSectionService
{
    /**
     * Gets the footer data.
     *
     * @return array  The footer data.
     */
    public function getSectionData()
    {
        return [
            'enabled' => true,
            'phone' => [
                'enabled' => true,
                'icon' => 'fa-phone-square',
                'text' => '503.619.6366',
                'link' => 'tel:1-503-619-6366',
            ],
            'email' => [
                'enabled' => true,
                'icon' => 'fa-envelope-square',
                'text' => 'jeremykenedy@gmail.com',
                'link' => 'mailto:jeremykenedy@gmail.com',
            ],
            'copyright' => trans('portfolio.footer.copyright'),
            'socialmedia' => [
                'items' => collect([
                    [
                        'name'      => 'GitHub',
                        'enabled'   => true,
                        'icon'      => 'fa-github-square',
                        'link'      => config('blog.sm.github_url'),
                    ],
                    [
                        'name'      => 'FaceBook',
                        'enabled'   => true,
                        'icon'      => 'fa-facebook-square',
                        'link'      => config('blog.sm.facebook_url'),
                    ],
                    [
                        'name'      => 'Twitter',
                        'enabled'   => true,
                        'icon'      => 'fa-twitter-square',
                        'link'      => config('blog.sm.twitter_url'),
                    ],
                    [
                        'name'      => 'Instagram',
                        'enabled'   => true,
                        'icon'      => 'fa-linkedin-square',
                        'link'      => config('blog.sm.linkedin_url'),
                    ],
                    [
                        'name'      => 'RSS',
                        'enabled'   => true,
                        'icon'      => 'fa-rss-square',
                        'link'      => route('feeds.blog'),
                    ],
                ]),
            ],
        ];
    }
}

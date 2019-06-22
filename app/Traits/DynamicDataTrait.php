<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Route;

trait DynamicDataTrait
{
    /**
     * Gets the about data.
     *
     * @return array The about data.
     */
    private function getAboutData()
    {
        return [
            'enabled'       => true,
            'titleEnabled'  => true,
            'aboutButtons'  => true,
            'navTitle'      => 'About Me',
            'intro'         => trans('portfolio.sections.about.intro'),
            'textTitle'     => trans('portfolio.sections.about.textTitle'),
            'text'          => trans('portfolio.sections.about.text'),
            'buttons'       => collect([
                [
                    'enabled'   => false,
                    'link'      => '#',
                    'text'      => 'Hire me',
                    'delay'     => '150',
                    'target'    => '_blank',
                ],
                [
                    'enabled'   => false,
                    'link'      => '#',
                    'text'      => 'Download CV',
                    'delay'     => '300',
                    'target'    => '_blank',
                ],
            ]),
        ];
    }

    private function getBlogData()
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
    private function getBlogPosts()
    {
        $blogPostsRequest = Request::create('/api/posts/all/', 'GET');
        $blogPosts = json_decode(Route::dispatch($blogPostsRequest)->getContent());

        return $blogPosts;
    }

    /**
     * Gets the contact data.
     *
     * @return array The contact data.
     */
    private function getContactData()
    {
        return [
            'enabled'       => true,
            'navTitle'      => 'Contact',
            'sectionTitle'  => 'Contact Me',
            'textTitle'     => 'Feel free to contact me!',
            'textContent'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, quasi unde quisquam facilis at ullam aperiam similique dicta voluptatibus!',
            'phone' => [
                'enabled'   => true,
                'icon'      => 'fa-phone',
                'text'      => '503.619.6366',
                'link'      => 'tel:1-503-619-6366',
            ],
            'email' => [
                'enabled'   => true,
                'icon'      => 'fa-envelope',
                'text'      => 'jeremykenedy@gmail.com',
                'link'      => 'mailto:jeremykenedy@gmail.com',
            ],
            'time' => [
                'enabled'   => true,
                'icon'      => 'fa-clock-o',
                'text'      => 'Pacific Standard Time',
            ],
            'location' => [
                'enabled'   => true,
                'icon'      => 'fa-map-marker',
                'text'      => 'Portland, OR, USA',
            ],
            'form' => [
                'labels'  => [
                    'name'      => 'Name*',
                    'email'     => 'Email*',
                    'subject'   => 'Subject',
                    'message'   => 'Type your message here*',
                ],
                'messages' => [
                    'successMsg'        => 'Your message was sent!',
                    'serverErrorMsg'    => 'Server error',
                ],
                'submitButton' => 'Send message',
            ],
        ];
    }

    /**
     * Gets the counters data.
     *
     * @return array The counters data.
     */
    private function getCountersData()
    {
        return [
            'enabled' => true,
            'background' => 'https://hdqwalls.com/wallpapers/code.jpg',
            'bsClass'    => "col-md-3 col-sm-6",
            'items' => collect([
                [
                    'title'     => 'Published Packagist Packages',
                    'number'    => '14',
                    'increment' => '',
                    'delay'     => '',
                    'icon'      => 'fa fa-code',
                    'link'      => 'https://packagist.org/profile/'
                ],
                [
                    'title'     => 'Package Downloads',
                    'number'    => '323584',
                    'increment' => '5000',
                    'delay'     => '150',
                    'icon'      => 'fa fa-heart',
                    'link'      => 'https://packagist.org/profile/',
                ],
                [
                    'title'     => 'Lines of Code Written',
                    'number'    => '7280476',
                    'increment' => '20000',
                    'delay'     => '300',
                    'icon'      => 'fa fa-coffee',
                    'link'      => 'https://sourcerer.io/jeremykenedy',
                ],
                [
                    'title'     => 'Open Source Commits',
                    'number'    => '1200',
                    'increment' => '10',
                    'delay'     => '450',
                    'icon'      => 'fa fa-trophy',
                    'link'      => '',
                ],
            ]),
        ];
    }

    /**
     * Gets the footer data.
     *
     * @return array  The footer data.
     */
    private function getFooterData()
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
                        'link'      => 'https://github.com/jeremykenedy',
                    ],
                    [
                        'name'      => 'FaceBook',
                        'enabled'   => true,
                        'icon'      => 'fa-facebook-square',
                        'link'      => '',
                    ],
                    [
                        'name'      => 'Twitter',
                        'enabled'   => true,
                        'icon'      => 'fa-twitter-square',
                        'link'      => '',
                    ],
                    [
                        'name'      => 'RSS',
                        'enabled'   => true,
                        'icon'      => 'fa-rss-square',
                        'link'      => '',
                    ],
                    [
                        'name'      => 'Instagram',
                        'enabled'   => true,
                        'icon'      => 'fa-instagram',
                        'link'      => '',
                    ],
                ]),
            ],
        ];
    }

    /**
     * Gets the intro data.
     *
     * @return     array  The intro data.
     */
    private function getIntroData()
    {
        return [
            'enabled'           => true,
            'particlesEnabled'  => true,
            'scrollHtmlEnabled' => true,
            'navTitle'          => 'Start',
            'downText'          => 'Scroll Down',
            'bgImage'           => 'https://paperlief.com/images/portland-wallpaper-4.jpg',
            'introStaticText'   => '',
            'speed'             => 4500,
            'introTypeingText'  => [
                "Engineering Manager",
                "Software Engineer",
                "Open Source Advocate",
                "Laravel Enthusiast",
            ],
        ];
    }

    /**
     * Gets the skills data.
     *
     * @return array The skills data.
     */
    private function getSkillsData()
    {
        return [
            'enabled'       => true,
            'titleEnabled'  => true,
            'title'         => 'My Skills',
            'items' => collect([
                [
                    'name'      => 'PHP <span class="c-silver"> - 9 years of experience</span>',
                    'percent'   => '100',
                ],
                [
                    'name'      => 'Laravel <span class="c-silver"> - 8 years of experience</span>',
                    'percent'   => '100',
                ],
                [
                    'name'      => 'HTML <span class="c-silver"> - 10 years of experience</span>',
                    'percent'   => '100',
                ],
                [
                    'name'      => 'CSS/SCSS/SASS/LESS <span class="c-silver"> - 10 years of experience</span>',
                    'percent'   => '100',
                ],
            ]),
        ];
    }

    private function getLogoText()
    {
        return 'JK';
    }

    /**
     * Gets the services data.
     *
     * @return array The services data.
     */
    private function getServicesData()
    {
        return [
            'enabled'               => true,
            'navTitle'              => 'Services',
            'sectionTitleEnabled'   => true,
            'sectionTitle'          => 'My Offer',
            'bsClass'               => "col-sm-6 col-md-3",
            'items' => collect([
                [
                    'name'  => 'Photography',
                    'icon'  => 'icon-camera',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, hic.</p>',
                    'delay' => '0',
                ],
                [
                    'name'  => 'Web design',
                    'icon'  => 'icon-tools',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, placeat!</p>',
                    'delay' => '150',
                ],
                [
                    'name'  => 'Web Development',
                    'icon'  => 'icon-laptop',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, mollitia.</p>',
                    'delay' => '300',
                ],
                [
                    'name'  => 'Mobile apps',
                    'icon'  => 'icon-mobile',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, veritatis?</p>',
                    'delay' => '450',
                ],
            ]),
        ];
    }

    /**
     * Gets the testimonials data.
     *
     * @return array The testimonials data.
     */
    private function getTestimonialsData()
    {
        return [
            'enabled'       => true,
            'sectionTitle'  => 'What people are saying',
            'items' => collect([
                [
                    'author'    => 'John Doe',
                    'icon'      => 'icon-profile-male',
                    'text'      => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi consectetur error eius dolor excepturi odit ipsum velit, repudiandae dolore libero!</p>',
                ],
                [
                    'author'    => 'Jane Doe',
                    'icon'      => 'icon-profile-female',
                    'text'      => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eum fuga vero deleniti et, velit dolorum consequuntur repellendus expedita dolorem.</p>',
                ],
            ]),
        ];
    }


    /**
     * Gets the portfolio data.
     *
     * @param      boolean  $enabled   The enabled
     * @param      integer  $limit     The limit
     * @param      boolean  $lightbox  The lightbox
     * @param      boolean  $spacing   The spacing
     * @param      boolean  $more      The more
     *
     * @return     array    The portfolio data.
     */
    private function getPortfolioData($enabled=true, $limit = null, $lightbox = false, $spacing=false, $more=true)
    {
        $items = $this->getPortfolioItems();
        if (!$limit) {
            $limit = count($items);
        }

        return [
            'enabled'       => $enabled,
            'spacing'       => $spacing,
            'lightBox'      => $lightbox,
            'navTitle'      => 'Portfolio',
            'sectionTitle'  => 'Portfolio',
            'itemLimit'     => $limit,
            'noItems'       => trans('portfolio.sections.portfolio.noItems'),
            'items'         => array_slice($items, 0, $limit),
            'seeMoreButton' => [
                'enabled'   => $more,
                'link'      => route('portfolio'),
                'text'      => 'See more',
                'icon'      => 'fa-long-arrow-right',
            ],
        ];
    }

    /**
     * Gets the portfolio items.
     *
     * @return array The portfolio items.
     */
    private function getPortfolioItems()
    {
        $portfolioItemsRequest = Request::create('/api/portfolioitems/all/', 'GET');
        $portfolioItems = json_decode(Route::dispatch($portfolioItemsRequest)->getContent());

        return $portfolioItems;
    }

    /**
     * Gets the preloader data.
     *
     * @return array The preloader data.
     */
    private function getPreloaderData()
    {
        return [
            'enabled' => true,
            'type'  => '8',    // 1-8
        ];
    }

}
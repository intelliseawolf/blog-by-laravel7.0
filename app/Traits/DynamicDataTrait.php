<?php

namespace App\Traits;

use App\Models\TimelineItem;
use App\Services\Sections\AboutSectionService;
use App\Services\Sections\BlogSectionService;
use App\Services\Sections\ContactSectionService;
use App\Services\Sections\CountersSectionService;
use App\Traits\TestimonialsDataTrait;
use Illuminate\Http\Request;
use Route;

trait DynamicDataTrait
{
    use TestimonialsDataTrait;

    /**
     * Gets the about data.
     *
     * @return array The about data.
     */
    public function getAboutData()
    {
        $service = new AboutSectionService;
        return $service->getAboutServiceData();
    }

    /**
     * Gets the blog data.
     *
     * @return array  The blog data.
     */
    public function getBlogData()
    {
        $service = new BlogSectionService;
        return $service->getBlogServiceData();
    }

    /**
     * Gets the contact data.
     *
     * @return array The contact data.
     */
    public function getContactData()
    {
        $service = new ContactSectionService;
        return $service->getContactServiceData();
    }

    /**
     * Gets the counters data.
     *
     * @return array The counters data.
     */
    public function getCountersData()
    {
        $service = new CountersSectionService;
        return $service->getCountersServiceData();
    }

    /**
     * Gets the education timeline data.
     */
    public function getEducationTimelineData($enabled = true)
    {
        $items = TimelineItem::allEnabledItemsByType('education')->get();

        return [
            'enabled'       => $enabled,
            'sectionTitle'  => 'My Education',
            'sectionClass'  => 'section--darker',
            'items'         => $items,
        ];
    }

    /**
     * Gets the experience timeline data.
     */
    public function getExperienceTimelineData($enabled = true)
    {
        $items = TimelineItem::allEnabledItemsByType('experience')->get();

        return [
            'enabled'       => $enabled,
            'sectionTitle'  => 'My Experience',
            'sectionClass'  => '',
            'items'         => $items,
        ];
    }

    /**
     * Gets the footer data.
     *
     * @return array  The footer data.
     */
    public function getFooterData()
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

    /**
     * Gets the intro data.
     *
     * @return     array  The intro data.
     */
    public function getIntroData()
    {
        return [
            'enabled'           => true,
            'particlesEnabled'  => false,
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
    public function getSkillsData()
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

    public function getLogoText()
    {
        return config('app.name', 'JK');
    }

    /**
     * Gets the services data.
     *
     * @return array The services data.
     */
    public function getServicesData()
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
    public function getTestimonialsData()
    {
        $seactionData = $this->getTestimonialSectionData();

        return [
            'enabled'       => $seactionData['sectionEnabled'],
            'sectionTitle'  => $seactionData['sectionTItle'],
            'items'         => $seactionData['seciontItems'],
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
    public function getPortfolioData($enabled = true, $limit = null, $lightbox = false, $spacing=false, $more=true)
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
    public function getPortfolioItems()
    {
        $portfolioItemsRequest  = Request::create('/api/portfolioitems/all/', 'GET');
        $portfolioItems         = json_decode(Route::dispatch($portfolioItemsRequest)->getContent());

        return $portfolioItems;
    }

    /**
     * Gets the preloader data.
     *
     * @return array The preloader data.
     */
    public function getPreloaderData()
    {
        return [
            'enabled' => true,
            'type'  => '8',    // 1-8
        ];
    }

}

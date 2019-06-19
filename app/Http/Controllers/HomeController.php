<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
     * Get the Sections Data
     *
     * @return array
     */
    private function sectionData()
    {
        return [
            'preloader' => [
                'enabled' => true,
                'type'  => '8',    // 1-8
            ],
            'intro' => [
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
            ],
            'about' => [
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
            ],
            'skills' => [
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
            ],
            'services' => [
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
            ],
            'counters' => [
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
            ],
            'portfolio' => [
                'enabled'       => true,
                'spacing'       => false,
                'lightBox'      => true,
                'navTitle'      => 'Portfolio',
                'sectionTitle'  => 'Portfolio',
                'itemLimit'     => '8',
                'items' => collect([
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Webdesign'
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Photography'
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Photography',
                            'Branding',
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Branding'
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Webdesign'
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Photography'
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Photography',
                            'Branding',
                        ],
                    ],
                    [
                        'name'  => 'Item name',
                        'image' => 'http://via.placeholder.com/476x476',
                        'href1' => 'project-page.html',
                        'href2' => 'http://via.placeholder.com/1300x950',
                        'tags'  => [
                            'Branding'
                        ],
                    ],
                ]),
                'seeMoreButton' => [
                    'enabled'   => true,
                    'link'      => 'project-list.html',
                    'text'      => 'See more',
                    'icon'      => 'fa-long-arrow-right',
                ],
            ],
            'blog' => [
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
                'posts'         => $this->getBlogPosts(),
                'noPosts'       => 'No Recent Posts',
            ],
            'testimonials' => [
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
            ],
            'contact' => [
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
            ],
            'footer' => [
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
            ],
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logoText = 'JK';
        $data = [
            'sections'      => $this->sectionData(),
            'logoText'      => $logoText,
        ];

        return view('portfolio.home')->with($data);
    }
}

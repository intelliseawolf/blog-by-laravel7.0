<?php

use App\Models\PortfolioItem;
use App\Models\PortfolioItemTag;
use App\Models\PortfolioItemTechTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedFakeItems = false;
        $seedRealItems = true;

        // Clear the Portfolio items table
        PortfolioItem::truncate();

        // Clear the portfio items tag pivot table
        DB::table('portfolio_item_tag_pivot')->truncate();

        // Clear the portfio items tech tag pivot table
        DB::table('portfolio_item_tech_tag_pivot')->truncate();

        /**
        * Seed Fake Items
        */
        if ($seedFakeItems) {
            // Get the Tags
            $portfolioTags = PortfolioItemTag::pluck('tag')->all();
            $portfolioTechTags = PortfolioItemTechTag::pluck('tag')->all();

            factory(PortfolioItem::class, 100)->create()->each(function ($portfolioItem) use ($portfolioTags, $portfolioTechTags) {

                shuffle($portfolioTags);
                $portfolioItemTags = [$portfolioTags[0]];

                shuffle($portfolioTechTags);
                $portfolioItemTechTags = [$portfolioTechTags[0]];

                // 40% of the time we're assigning portfolioTags, assign 2
                if (mt_rand(1, 100) <= 40) {
                    $portfolioItemTags[] = $portfolioTags[1];
                }

                // 90% of the time we're assigning portfolioTags, assign 4
                if (mt_rand(1, 100) <= 90) {
                    $portfolioItemTechTags[] = $portfolioTechTags[0];
                    $portfolioItemTechTags[] = $portfolioTechTags[1];
                    $portfolioItemTechTags[] = $portfolioTechTags[2];
                    $portfolioItemTechTags[] = $portfolioTechTags[3];
                }

                $portfolioItem->syncTags($portfolioItemTags);
                $portfolioItem->syncTechTags($portfolioItemTechTags);
            });
        }

        /**
        * Seed Real Items
        */
        if ($seedRealItems) {
            $items = [
                [
                    'slug'                  => 'laravel-auth',
                    'title'                 => 'LaravelAuth',
                    'subtitle'              => 'Laravel 5.8 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection.',
                    'content_raw'           => 'Laravel 5.8 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. Uses offical [Bootstrap 4](http://getbootstrap.com). This also makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing. Project can be stood up in minutes.',
                    'content_html'          => '<p>Laravel 5.8 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. Uses offical [Bootstrap 4](http://getbootstrap.com).</p><p>This also makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing. </p><p>Complete Build of Laravel 5.8 with Email Registration Verification, Social Authentication, User Roles and Permissions, User Profiles, and Admin restricted user management system. Built on Bootstrap 4.</p><p>Project can be stood up in minutes.</p>',
                    'item_image'            => asset('images/portfolio-items/laravel-auth.jpeg'),
                    'item_image_large'      => asset('images/portfolio-items/laravel-auth.jpeg'),
                    'project_link_enabled'  => 1,
                    'project_link'          => 'https://github.com/jeremykenedy/laravel-auth',
                    'meta_description'      => 'Laravel 5.8 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. ',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development', 'design'],
                    'tech_tags'             => ['laravel', 'php', 'bootstrap', 'html_5'],
                ],
                [
                    'slug'                  => 'larablog',
                    'title'                 => 'LaraBlog',
                    'subtitle'              => 'A powerful open source Laravel Blog.',
                    'content_raw'           => 'A powerful open source Laravel Blog with WYSWYG and CRUD (Create Read Update Delete) built on Laravel 5.8 and Bootstrap 4. Larablog is licensed under the MIT license.',
                    'content_html'          => '<p>A powerful open source Laravel Blog with WYSWYG and CRUD (Create Read Update Delete) built on Laravel 5.8 and Bootstrap 4</p><p>Larablog is licensed under the MIT license.</p>',
                    'item_image'            => asset('images/portfolio-items/larablog.jpg'),
                    'item_image_large'      => asset('images/portfolio-items/larablog.jpg'),
                    'project_link_enabled'  => 1,
                    'project_link'          => 'https://github.com/jeremykenedy/larablog',
                    'meta_description'      => 'larablog',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development', 'design'],
                    'tech_tags'             => ['laravel', 'php', 'bootstrap', 'html_5'],
                ],
                [
                    'slug'                  => 'experienceeverythingkce',
                    'title'                 => 'Kindcare Intranet and LMS',
                    'subtitle'              => 'Kindcare Intranet and Learning Management System',
                    'content_raw'           => 'Kindcare Intranet and Full Learning Management System.',
                    'content_html'          => '<p>Kindcare Intranet and Full Learning Management System.</p>',
                    'item_image'            => 'https://assets.themuse.com/uploaded/companies/1498/small_logo.png?v=f4e47d0e473de29363381f4de720c5417f331f6e5f14ec87f922fe4b71556ab8',
                    'item_image_large'      => 'https://assets.themuse.com/uploaded/companies/1498/small_logo.png?v=f4e47d0e473de29363381f4de720c5417f331f6e5f14ec87f922fe4b71556ab8',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'https://experienceeverythingkce.com/',
                    'meta_description'      => 'Kindcare Intranet and Learning Management System',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development'],
                    'tech_tags'             => ['laravel', 'php', 'html_5', 'javascript', 'vue_js', 'sass_scss'],
                ],
                [
                    'slug'                  => 'vernier',
                    'title'                 => 'Vernier Software & Technology',
                    'subtitle'              => 'Education Software & Equipment',
                    'content_raw'           => 'Full website front end rebuild for 4000+ pages with E-commerce section. Build back end templating engine to handle loads with various API inegrations.',
                    'content_html'          => '<p>Full website front end rebuild for 4000+ pages with E-commerce section.</p><p>Build back end templating engine to handle loads with various API inegrations.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/vernier.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/vernier.jpg',
                    'project_link_enabled'  => 1,
                    'project_link'          => 'https://www.vernier.com/',
                    'meta_description'      => 'Vernier Software & Technology, Education Software & Equipment',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development', 'design'],
                    'tech_tags'             => ['php', 'javscript', 'bootstrap', 'html_5'],
                ],
                [
                    'slug'                  => 'pela',
                    'title'                 => 'Portland English Language Academy',
                    'subtitle'              => 'Complete Build',
                    'content_raw'           => 'Complete front and backend build on WordPress CMS with custom theme and templates.',
                    'content_html'          => '<p>Complete front and backend build on WordPress CMS with custom theme and templates.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/pela-jeremy.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/pela-jeremy.jpg',
                    'project_link_enabled'  => 1,
                    'project_link'          => 'https://portlandenglish.edu/',
                    'meta_description'      => 'Portland English Language Academy | Complete Build',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development'],
                    'tech_tags'             => ['php', 'wordpress', 'html_5', 'sass_scss'],
                ],
                [
                    'slug'                  => 'cityhomepdx',
                    'title'                 => 'City Home Portland',
                    'subtitle'              => 'City Home Portland | Furniture and Home Decor',
                    'content_raw'           => 'City Home Portland - Furniture and Home Decor. Theme and template development.',
                    'content_html'          => '<p>City Home Portland - Furniture and Home Decor.</p><p>Theme and template development.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/jeremy-cityhomepdx-com.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/jeremy-cityhomepdx-com.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'City Home Portland - Furniture and Home Decor. Theme and template development.',
                    'meta_description'      => 'City Home Portland - Furniture and Home Decor. Theme and template development.',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development'],
                    'tech_tags'             => ['php', 'wordpress', 'html_5'],
                ],
                [
                    'slug'                  => 'cityhomepdx_landing',
                    'title'                 => 'City Home Portland Landing Page',
                    'subtitle'              => 'Landing Page',
                    'content_raw'           => 'City Home Portland - Landing Page',
                    'content_html'          => '<p>City Home Portland - Landing Page</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/cityhomepdx-landing.png',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/cityhomepdx-landing.png',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'null',
                    'meta_description'      => 'City Home Portland - Landing Page',
                    'enabled'               => 1,
                    'tags'                  => ['front_end_development'],
                    'tech_tags'             => ['html_5', 'sass_scss'],
                ],
                [
                    'slug'                  => 'facebook-contest-app',
                    'title'                 => 'Facebook Contest App',
                    'subtitle'              => 'Facebook Application',
                    'content_raw'           => 'Using the Facebook APK to interact with custom database and generate business leads.',
                    'content_html'          => '<p>Using the Facebook APK to interact with custom database and generate business leads.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-och-fb-jk.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-och-fb-jk.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'null',
                    'meta_description'      => 'Facebook Contest App',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development', 'design'],
                    'tech_tags'             => ['php', 'html_5', 'facebook_sdk'],
                ],
                [
                    'slug'                  => 'facebook-app-probono',
                    'title'                 => 'ProBono | Facebook Wall Feed Plugin for Website',
                    'subtitle'              => 'Facebook Wall Feed Plugin for Website',
                    'content_raw'           => 'Using the Facebook APK to interact with Facebook API to pull wall data for an animal shelter.',
                    'content_html'          => '<p>Using the Facebook APK to interact with Facebook API to pull wall data for an animal shelter.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-ruincreek-fb-jk.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-ruincreek-fb-jk.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'null',
                    'meta_description'      => 'Facebook Wall Feed Plugin for Website',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development'],
                    'tech_tags'             => ['php', 'facebook_sdk'],
                ],
                [
                    'slug'                  => 'facebook-survey-app',
                    'title'                 => 'Facebook Survey App',
                    'subtitle'              => 'Facebook Application',
                    'content_raw'           => 'Using the Facebook APK to interact with Facebook API for custom survey.',
                    'content_html'          => '<p>Using the Facebook APK to interact with Facebook API for custom survey.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-ul-fb-jk.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-ul-fb-jk.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => '',
                    'meta_description'      => 'Facebook Survey Application',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development'],
                    'tech_tags'             => ['php', 'facebook_sdk'],
                ],
                [
                    'slug'                  => 'custom-cms-api-dev',
                    'title'                 => 'Integration Custom CMS and API',
                    'subtitle'              => 'Integration Custom CMS and API | Design by Taggart Media Group',
                    'content_raw'           => 'Integration Custom CMS and API | Design by Taggart Media Group',
                    'content_html'          => '<p>Integration Custom CMS and API | Design by Taggart Media Group</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/trufusion-jeremy.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/trufusion-jeremy.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'null',
                    'meta_description'      => 'Integration Custom CMS and API | Design by Taggart Media Group',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development'],
                    'tech_tags'             => ['php', 'mindbody_api'],
                ],
                [
                    'slug'                  => 'real-time-locator',
                    'title'                 => 'Real Time Locator Using Google Maps API3',
                    'subtitle'              => 'Real Time Locator Using Google Maps API3 for Oil Can Henry\'s',
                    'content_raw'           => 'Real Time Locator Using Google Maps API3 for Oil Can Henry\'s',
                    'content_html'          => '<p>Real Time Locator Using Google Maps API3 for Oil Can Henry\'s</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-och-locator-jk.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-och-locator-jk.jpg',
                    'project_link_enabled'  => 1,
                    'project_link'          => '',
                    'meta_description'      => 'Real Time Locator Using Google Maps API3 for Oil Can Henrys',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development', 'design'],
                    'tech_tags'             => ['php', 'google_api'],
                ],
                [
                    'slug'                  => 'small-business-e-commerce',
                    'title'                 => 'Small Business Website | Online Commerce',
                    'subtitle'              => 'Small Business Website | Online Commerce',
                    'content_raw'           => 'Small Business Website | Online Commerce',
                    'content_html'          => '<p>Small Business Website | Online Commerce</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-bb-jeremy.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-bb-jeremy.jpg',
                    'project_link_enabled'  => 1,
                    'project_link'          => 'http://www.busybeemanufacturing.com',
                    'meta_description'      => 'Small Business Website | Online Commerce',
                    'enabled'               => 1,
                    'tags'                  => ['front_end_development'],
                    'tech_tags'             => ['html_5', 'sass_scss'],
                ],
                [
                    'slug'                  => 'daycare',
                    'title'                 => 'ProBono | Small Business Website',
                    'subtitle'              => 'ProBono | Small Business Website',
                    'content_raw'           => 'ProBono | Small Business Website for local Daycare',
                    'content_html'          => '<p>ProBono | Small Business Website for local Daycare</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-ls-jeremy.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-ls-jeremy.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => '',
                    'meta_description'      => 'ProBono | Small Business Website for local Daycare',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development', 'design'],
                    'tech_tags'             => ['php', 'google_api', 'html_5', 'sass_scss'],
                ],
                [
                    'slug'                  => 'paracore',
                    'title'                 => 'ParaCore Website',
                    'subtitle'              => 'ParaCore Website',
                    'content_raw'           => 'Complete ParaCore Website built in 24 hours strait hackathon style.',
                    'content_html'          => '<p>Complete ParaCore Website built in 24 hours strait hackathon style.</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-paracore.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-paracore.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => 'https://www.paracore.com/',
                    'meta_description'      => 'ParaCore Website',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development'],
                    'tech_tags'             => ['laravel', 'php', 'html_5', 'javascript', 'sass_scss', 'foundation'],
                ],
                [
                    'slug'                  => 'Enlighten-MD',
                    'title'                 => 'Enlighten MD Website',
                    'subtitle'              => 'Enlighten MD | Medical Website',
                    'content_raw'           => 'Enlighten MD Medical Office Website',
                    'content_html'          => '<p>Enlighten MD Medical Office Website</p>',
                    'item_image'            => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-enlighten.jpg',
                    'item_image_large'      => 'https://jeremykenedy.com/uploads/image/portfolio-items/combined-desktop-ipad-iphone-enlighten.jpg',
                    'project_link_enabled'  => 0,
                    'project_link'          => '',
                    'meta_description'      => 'Enlighten MD Medical Office Website',
                    'enabled'               => 1,
                    'tags'                  => ['back_end_development', 'front_end_development'],
                    'tech_tags'             => ['laravel', 'php', 'html_5', 'sass_scss', 'foundation'],
                ],
                // [
                //     'slug'                  => null,
                //     'title'                 => null,
                //     'subtitle'              => null,
                //     'content_raw'           => null,
                //     'content_html'          => null,
                //     'item_image'            => null,
                //     'item_image_large'      => null,
                //     'project_link_enabled'  => 1,
                //     'project_link'          => null,
                //     'meta_description'      => null,
                //     'enabled'               => 1,
                //     'tags'                  => [],
                //     'tech_tags'             => [],
                // ],
                // [
                //     'slug'                  => null,
                //     'title'                 => null,
                //     'subtitle'              => null,
                //     'content_raw'           => null,
                //     'content_html'          => null,
                //     'item_image'            => null,
                //     'item_image_large'      => null,
                //     'project_link_enabled'  => 1,
                //     'project_link'          => null,
                //     'meta_description'      => null,
                //     'enabled'               => 1,
                //     'tags'                  => [],
                //     'tech_tags'             => [],
                // ],
                // [
                //     'slug'                  => null,
                //     'title'                 => null,
                //     'subtitle'              => null,
                //     'content_raw'           => null,
                //     'content_html'          => null,
                //     'item_image'            => null,
                //     'item_image_large'      => null,
                //     'project_link_enabled'  => 1,
                //     'project_link'          => null,
                //     'meta_description'      => null,
                //     'enabled'               => 1,
                //     'tags'                  => [],
                //     'tech_tags'             => [],
                // ],
            ];




                // [
                //     'slug'                  => null,
                //     'title'                 => null,
                //     'subtitle'              => null,
                //     'content_raw'           => null,
                //     'content_html'          => null,
                //     'item_image'            => null,
                //     'item_image_large'      => null,
                //     'project_link_enabled'  => 1,
                //     'project_link'          => null,
                //     'meta_description'      => null,
                //     'enabled'               => 1,
                //     'tags'                  => [],
                //     'tech_tags'             => [],
                // ],
            foreach ($items as $item) {
                $newPortfolioItem = PortfolioItem::where('slug', '=', $item['slug'])->first();
                if ($newPortfolioItem === null) {
                    $newPortfolioItem = PortfolioItem::create([
                        'slug'                  => $item['slug'],
                        'title'                 => $item['title'],
                        'subtitle'              => $item['subtitle'],
                        'content_raw'           => $item['content_raw'],
                        'content_html'          => $item['content_html'],
                        'item_image'            => $item['item_image'],
                        'item_image_large'      => $item['item_image_large'],
                        'project_link_enabled'  => $item['project_link_enabled'],
                        'project_link'          => $item['project_link'],
                        'meta_description'      => $item['meta_description'],
                        'enabled'               => $item['enabled'],
                    ]);
                    $newPortfolioItem->syncTags($item['tags']);
                    $newPortfolioItem->syncTechTags($item['tech_tags']);
                }
            }
        }
    }
}

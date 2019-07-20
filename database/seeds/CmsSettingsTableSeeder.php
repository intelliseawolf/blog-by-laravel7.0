<?php

use App\Models\CmsSetting;
use Illuminate\Database\Seeder;

class CmsSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name'      => 'CMS Cache',
                'key'       => 'cms_cache',
                'value'     => '100',
                'active'    => 1,
            ],
            [
                'name'      => 'Logo Text',
                'key'       => 'logo_text',
                'value'     => 'JK',
                'active'    => 1,
            ],
            [
                'name'      => 'Intro Section',
                'key'       => 'intro_section',
                'value'     => 'Start',
                'active'    => 1,
            ],
            [
                'name'      => 'Intro Section Particles Enabled',
                'key'       => 'intro_section_particles_enabled',
                'value'     => null,
                'active'    => 1,
            ],
            [
                'name'      => 'Intro Section Scroll HTML',
                'key'       => 'intro_section_scroll_html',
                'value'     => 'Scroll Down',
                'active'    => 1,
            ],
            [
                'name'      => 'Intro Section Background',
                'key'       => 'intro_section_background',
                'value'     => 'https://paperlief.com/images/portland-wallpaper-4.jpg',
                'active'    => 1,
            ],
            [
                'name'      => 'Intro Section Static Text',
                'key'       => 'intro_section_static_text',
                'value'     => null,
                'active'    => 0,
            ],
            [
                'name'      => 'Intro Section Text Speed',
                'key'       => 'intro_section_text_speed',
                'value'     => 4500,
                'active'    => 1,
            ],
            [
                'name'      => 'About Section',
                'key'       => 'about_section',
                'value'     => 'About Me',
                'active'    => 1,
            ],
            [
                'name'      => 'About Section Title',
                'key'       => 'about_section_title',
                'value'     => trans('portfolio.sections.about.textTitle'),
                'active'    => 1,
            ],
            [
                'name'      => 'About Section Intro',
                'key'       => 'about_section_intro',
                'value'     => trans('portfolio.sections.about.intro'),
                'active'    => 1,
            ],
            [
                'name'      => 'About Section Text',
                'key'       => 'about_section_text',
                'value'     => trans('portfolio.sections.about.text'),
                'active'    => 1,
            ],
            [
                'name'      => 'Skills Section Enabled',
                'key'       => 'skills_section_enabled',
                'value'     => null,
                'active'    => 1,
            ],
            [
                'name'      => 'Skills Section Title',
                'key'       => 'skills_section_title',
                'value'     => 'My Skills',
                'active'    => 1,
            ],
            [
                'name'      => 'Services Section',
                'key'       => 'services_section',
                'value'     => 'Services',
                'active'    => 1,
            ],
            [
                'name'      => 'Services Section Title',
                'key'       => 'services_section_title',
                'value'     => 'My Services',
                'active'    => 1,
            ],
            [
                'name'      => 'Counter Section Enabled',
                'key'       => 'counter_section_enabled',
                'value'     => null,
                'active'    => 1,
            ],
            [
                'name'      => 'Counter Section Background',
                'key'       => 'counter_section_background',
                'value'     => 'https://hdqwalls.com/wallpapers/code.jpg',
                'active'    => 1,
            ],
            [
                'name'      => 'Portfolio Section',
                'key'       => 'portfolio_section',
                'value'     => 'Portfolio',
                'active'    => 1,
            ],
            [
                'name'      => 'Portfolio Section Limit',
                'key'       => 'portfolio_section_limit',
                'value'     => 8,
                'active'    => 1,
            ],
            [
                'name'      => 'Portfolio Section Lightbox Enabled',
                'key'       => 'portfolio_section_lightbox_enabled',
                'value'     => null,
                'active'    => 0,
            ],
            [
                'name'      => 'Portfolio Section Spacing Enabled',
                'key'       => 'portfolio_section_spacing_enabled',
                'value'     => null,
                'active'    => 0,
            ],
            [
                'name'      => 'Portfolio Section Section Title',
                'key'       => 'portfolio_section_section_title',
                'value'     => 'Portfolio',
                'active'    => 1,
            ],
            [
                'name'      => 'Portfolio Section See More Button',
                'key'       => 'portfolio_section_see_more_button',
                'value'     => 'See More',
                'active'    => 1,
            ],
            [
                'name'      => 'Experience Timeline Section',
                'key'       => 'experience_timeline_section',
                'value'     => 'My Experience',
                'active'    => 1,
            ],
            [
                'name'      => 'Experience Timeline Section CSS Class',
                'key'       => 'experience_timeline_section_css_class',
                'value'     => null,
                'active'    => 0,
            ],
            [
                'name'      => 'Education Timeline Section',
                'key'       => 'education_timeline_section',
                'value'     => 'My Education',
                'active'    => 1,
            ],
            [
                'name'      => 'Education Timeline Section CSS Class',
                'key'       => 'education_timeline_section_css_class',
                'value'     => 'section--darker',
                'active'    => 1,
            ],
            [
                'name'      => 'Blog Section',
                'key'       => 'blog_section',
                'value'     => 'Blog',
                'active'    => 1,
            ],
            [
                'name'      => 'Blog Section Title',
                'key'       => 'blog_section_title',
                'value'     => 'Latest Blog Posts',
                'active'    => 1,
            ],
            [
                'name'      => 'Blog Section Limit',
                'key'       => 'blog_section_limit',
                'value'     => 3,
                'active'    => 1,
            ],
            [
                'name'      => 'Blog Section See More Button',
                'key'       => 'blog_section_see_more_button',
                'value'     => 'See More',
                'active'    => 1,
            ],
            [
                'name'      => 'Testimonial Section Enabled',
                'key'       => 'testimonial_section_enabled',
                'value'     => null,
                'active'    => 1,
            ],
            [
                'name'      => 'Testimonial Section Title',
                'key'       => 'testimonial_section_title',
                'value'     => 'What people are saying',
                'active'    => 1,
            ],
            [
                'name'      => 'Contact Section',
                'key'       => 'contact_section',
                'value'     => 'Contact',
                'active'    => 1,
            ],
            [
                'name'      => 'Contact Section Title',
                'key'       => 'contact_section_title',
                'value'     => 'Contact Me',
                'active'    => 1,
            ],



        ];

        foreach ($settings as $setting) {
            $newCmsSetting = CmsSetting::where('name', '=', $setting['name'])
                                            ->orWhere('key', '=', $setting['key'])
                                            ->first();

            if ($newCmsSetting === null) {
                $newCmsSetting = CmsSetting::create([
                    'name'      => $setting['name'],
                    'key'       => $setting['key'],
                    'value'     => $setting['value'],
                    'active'    => $setting['active'],
                ]);
            }
        }
    }
}

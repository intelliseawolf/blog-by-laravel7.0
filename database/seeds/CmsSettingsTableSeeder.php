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
                'value'     => '',
                'active'    => 0,
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
                'value'     => '',
                'active'    => 0,
            ],
            [
                'name'      => 'Intro Section Text Speed',
                'key'       => 'intro_section_text_speed',
                'value'     => 4500,
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

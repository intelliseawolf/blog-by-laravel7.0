<?php

use App\Models\AboutSectionButton;
use Illuminate\Database\Seeder;

class AboutSectionButtonsSeeder extends Seeder
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
                'link'          => '#',
                'text'          => 'Hire Me',
                'delay'         => 150,
                'target'        => '_blank',
                'sort_order'    => 1,
            ],
            [
                'active'        => 1,
                'link'          => '#',
                'text'          => 'Download CV',
                'delay'         => 300,
                'target'        => '_blank',
                'sort_order'    => 2,
            ],
        ];

        foreach ($items as $item) {
            $newAboutSectionButton = AboutSectionButton::where('text', '=', $item['text'])->first();

            if ($newAboutSectionButton === null) {
                $newAboutSectionButton = AboutSectionButton::create([
                    'active'        => $item['active'],
                    'link'          => $item['link'],
                    'text'          => $item['text'],
                    'delay'         => $item['delay'],
                    'target'        => $item['target'],
                    'sort_order'    => $item['sort_order'],
                ]);
            }
        }
    }
}

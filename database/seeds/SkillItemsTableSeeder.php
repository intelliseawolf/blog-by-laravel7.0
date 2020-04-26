<?php

use App\Models\SkillItem;
use Illuminate\Database\Seeder;

class SkillItemsTableSeeder extends Seeder
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
                'name'          => 'Engineering Managment <span class="c-silver"> - 4 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 7,
            ],
            [
                'active'        => 1,
                'name'          => 'PHP (OOP) <span class="c-silver"> - 10 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 1,
            ],
            [
                'active'        => 1,
                'name'          => 'Laravel <span class="c-silver"> - 10 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 2,
            ],
            [
                'active'        => 1,
                'name'          => 'Javascript <span class="c-silver"> - 10 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 3,
            ],
            [
                'active'        => 1,
                'name'          => 'VueJs/Node/React <span class="c-silver"> - 5 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 4,
            ],
            [
                'active'        => 1,
                'name'          => 'HTML/CSS/SCSS/SASS/LESS <span class="c-silver"> - 12 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 5,
            ],
            [
                'active'        => 1,
                'name'          => 'API Integration <span class="c-silver"> - 8 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 6,
            ],
        ];
        foreach ($items as $item) {
            $newSkillItem = SkillItem::where('name', '=', $item['name'])->first();
            if ($newSkillItem === null) {
                $newSkillItem = SkillItem::create([
                    'active'        => $item['active'],
                    'name'          => $item['name'],
                    'percent'       => $item['percent'],
                    'sort_order'    => $item['sort_order'],
                ]);
            }
        }
    }
}

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
                'name'          => 'PHP <span class="c-silver"> - 9 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 1,
            ],
            [
                'active'        => 1,
                'name'          => 'Laravel <span class="c-silver"> - 8 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 2,
            ],
            [
                'active'        => 1,
                'name'          => 'HTML <span class="c-silver"> - 10 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 3,
            ],
            [
                'active'        => 1,
                'name'          => 'CSS/SCSS/SASS/LESS <span class="c-silver"> - 10 years of experience</span>',
                'percent'       => '100',
                'sort_order'    => 4,
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

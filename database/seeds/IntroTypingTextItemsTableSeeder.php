<?php

use App\Models\IntroTypingTextItem;
use Illuminate\Database\Seeder;

class IntroTypingTextItemsTableSeeder extends Seeder
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
                'value'         => "Engineering Manager",
                'active'        => 1,
                'sort_order'    => 1,
            ],
            [
                'value'         => "Software Engineer",
                'active'        => 1,
                'sort_order'    => 2,
            ],
            [
                'value'         => "Open Source Advocate",
                'active'        => 1,
                'sort_order'    => 3,
            ],
            [
                'value'         => "Laravel Enthusiast",
                'active'        => 1,
                'sort_order'    => 4,
            ],
        ];

        foreach ($items as $item) {
            $newIntroTypingTextItem = IntroTypingTextItem::where('value', '=', $item['value'])->first();

            if ($newIntroTypingTextItem === null) {
                $newIntroTypingTextItem = IntroTypingTextItem::create([
                    'value'         => $item['value'],
                    'active'        => $item['active'],
                    'sort_order'    => $item['sort_order'],
                ]);
            }
        }
    }
}

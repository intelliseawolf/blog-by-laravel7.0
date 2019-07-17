<?php

use App\Models\ServiceItem;
use Illuminate\Database\Seeder;

class ServiceItemsTableSeeder extends Seeder
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
                'name'          => 'Photography',
                'icon'          => 'icon-camera',
                'text'          => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, hic.</p>',
                'sort_order'    => 1,
            ],
            [
                'active'        => 1,
                'name'          => 'Web design',
                'icon'          => 'icon-tools',
                'text'          => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, placeat!</p>',
                'sort_order'    => 2,
            ],
            [
                'active'        => 1,
                'name'          => 'Web Development',
                'icon'          => 'icon-laptop',
                'text'          => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, mollitia.</p>',
                'sort_order'    => 3,
            ],
            [
                'active'        => 1,
                'name'          => 'Mobile apps',
                'icon'          => 'icon-mobile',
                'text'          => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, veritatis?</p>',
                'sort_order'    => 4,
            ],
        ];
        foreach ($items as $item) {
            $newServiceItem = ServiceItem::where('name', '=', $item['name'])->first();
            if ($newServiceItem === null) {
                $newServiceItem = ServiceItem::create([
                    'active'        => $item['active'],
                    'name'          => $item['name'],
                    'icon'          => $item['icon'],
                    'text'          => $item['text'],
                    'sort_order'    => $item['sort_order'],
                ]);
            }
        }
    }
}

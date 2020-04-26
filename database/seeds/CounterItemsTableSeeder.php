<?php

use App\Models\CounterItem;
use App\Models\CounterType;
use Illuminate\Database\Seeder;

class CounterItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeCustom = CounterType::where('type', '=', 'custom')->first();
        $typePackagistVendorPackagesCount = CounterType::where('type', '=', 'packagistVendorPackagesCount')->first();
        $typePackagistVendorsTotalDownloads = CounterType::where('type', '=', 'packagistVendorsTotalDownloads')->first();

        $items = [
            [
                'active'        => 1,
                'type_id'       => $typePackagistVendorPackagesCount->id,
                'title'         => 'Published Packagist Packages',
                'number'        => null,
                'increment'     => null,
                'icon'          => 'fa fa-code',
                'link'          => 'https://packagist.org/packages/jeremykenedy/',
                'vendor'        => 'jeremykenedy',
                'repository'    => null,
                'sort_order'    => 1,
            ],
            [
                'active'        => 1,
                'type_id'       => $typePackagistVendorsTotalDownloads->id,
                'title'         => 'Package Downloads',
                'number'        => null,
                'increment'     => null,
                'icon'          => 'fa fa-download',
                'link'          => 'https://packagist.org/packages/jeremykenedy/',
                'vendor'        => 'jeremykenedy',
                'repository'    => null,
                'sort_order'    => 2,
            ],
            [
                'active'        => 1,
                'type_id'       => $typeCustom->id,
                'title'         => 'Lines of Code Written',
                'number'        => 9305966,
                'increment'     => 20000,
                'icon'          => 'fa fa-coffee',
                'link'          => 'https://sourcerer.io/jeremykenedy',
                'vendor'        => null,
                'repository'    => null,
                'sort_order'    => 3,
            ],
            [
                'active'        => 1,
                'type_id'       => $typeCustom->id,
                'title'         => 'Open Source Commits',
                'number'        => 1465,
                'increment'     => 10,
                'icon'          => 'fa fa-trophy',
                'link'          => 'https://sourcerer.io/jeremykenedy',
                'vendor'        => null,
                'repository'    => null,
                'sort_order'    => 4,
            ],
        ];
        foreach ($items as $item) {
            $newCounterItem = CounterItem::create([
                'active'        => $item['active'],
                'type_id'       => $item['type_id'],
                'title'         => $item['title'],
                'number'        => $item['number'],
                'increment'     => $item['increment'],
                'icon'          => $item['icon'],
                'link'          => $item['link'],
                'vendor'        => $item['vendor'],
                'repository'    => $item['repository'],
                'sort_order'    => $item['sort_order'],
            ]);
        }
    }
}

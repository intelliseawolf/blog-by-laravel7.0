<?php

use App\Models\CounterType;
use Illuminate\Database\Seeder;

class CounterTypesTableSeeder extends Seeder
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
                'type' => 'custom',
                'name' => 'Custom',
            ],
            [
                'type' => 'packagistVendorPackagesCount',
                'name' => 'Packagist Vendor Packages Count'
            ],
            [
                'type' => 'packagistVendorsTotalDownloads',
                'name' => 'Packagist Vendors Total Downloads'
            ],
        ];
        foreach ($items as $item) {
            $newCounterType = CounterType::where('type', '=', $item['type'])
                                            ->orWhere('name', '=', $item['name'])
                                            ->first();
            if ($newCounterType === null) {
                $newCounterType = CounterType::create([
                    'type' => $item['type'],
                    'name' => $item['name'],
                ]);
            }
        }
    }
}

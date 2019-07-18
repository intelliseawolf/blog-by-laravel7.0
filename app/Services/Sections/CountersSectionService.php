<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\CounterItem;
use App\Models\CounterType;
use App\Services\CmsServices;
use jeremykenedy\LaravelPackagist\App\Services\PackagistApiServices;

class CountersSectionService extends CmsServices
{
    /**
     * Gets the counters data.
     *
     * @return array The counters data.
     */
    public function getSectionData()
    {
        // WIP @TODO :: Abstract into methods and scopes :: Sort by sort_order

        // Abstract into own Method
        $activeCounterItems = CounterItem::activeItems()->get();

        // Abstract into own method
        $counterItems = [];
        foreach ($activeCounterItems as $activeCounterItem) {

            // Abstract into own method
            if ($activeCounterItem->counterType->type == 'custom') {
                $counterItems[] = $activeCounterItem;
            }

            // Abstract into own method
            if ($activeCounterItem->counterType->type == 'packagistVendorPackagesCount') {

                // Need to abstract into call with checking on $activeCounterItem->vendor)
                $activeCounterItem->number = PackagistApiServices::getVendorPackagesCount($activeCounterItem->vendor);
                $counterItems[] = $activeCounterItem;
            }

            // Abstract into own method
            if ($activeCounterItem->counterType->type == 'packagistVendorsTotalDownloads') {

                // Need to abstract into call with checking on $activeCounterItem->vendor)
                $packagistVendorsTotalDownloads = PackagistApiServices::getVendorsTotalDownloads($activeCounterItem->vendor);
                $activeCounterItem->number = $packagistVendorsTotalDownloads;
                $activeCounterItem->increment = $packagistVendorsTotalDownloads / 500;
                $counterItems[] = $activeCounterItem;
            }

            // Return Value from new method
        }
        // WIP

        // @TODO :: Add to CMS Settings table and call from methods
        return [
            'enabled'       => true,
            'background'    => 'https://hdqwalls.com/wallpapers/code.jpg',
            'bsClass'       => "col-md-3 col-sm-6",
            'items'         => $counterItems,
        ];
    }

}

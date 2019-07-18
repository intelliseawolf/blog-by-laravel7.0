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

        // WIP // TODO :: Abstract into methods and scopes :: Sort by sort_order
        $counterItems = [];
        $activeCounterItems = CounterItem::activeItems()->get();

        foreach ($activeCounterItems as $activeCounterItem) {
            if ($activeCounterItem->counterType->type == 'custom') {
                $counterItems[] = $activeCounterItem;
            }
            if ($activeCounterItem->counterType->type == 'packagistVendorPackagesCount') {
                $activeCounterItem->number = PackagistApiServices::getVendorPackagesCount($activeCounterItem->vendor);;
                $counterItems[] = $activeCounterItem;
            }
            if ($activeCounterItem->counterType->type == 'packagistVendorsTotalDownloads') {
                $packagistVendorsTotalDownloads = PackagistApiServices::getVendorsTotalDownloads($activeCounterItem->vendor);;
                $activeCounterItem->number = $packagistVendorsTotalDownloads;
                $activeCounterItem->increment = $packagistVendorsTotalDownloads / 500;
                $counterItems[] = $activeCounterItem;
            }
        }
        // WIP

        return [
            'enabled'       => true,
            'background'    => 'https://hdqwalls.com/wallpapers/code.jpg',
            'bsClass'       => "col-md-3 col-sm-6",
            'items'         => $counterItems,
        ];
    }

}

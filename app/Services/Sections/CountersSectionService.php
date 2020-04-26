<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\CounterItem;
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
        $sectionBgImage = '';
        $counterSectionBackground = self::getCounterSectionBackground();

        if ($counterSectionBackground->active) {
            $sectionBgImage = $counterSectionBackground->value;
        }

        return [
            'enabled'       => self::getCounterSectionEnabled()->active,
            'background'    => $sectionBgImage,
            'bsClass'       => 'col-md-3 col-sm-6',
            'items'         => self::getParsedCounterItems(),
        ];
    }

    /**
     * Gets the counter section enabled from the CMS Settings table.
     *
     * @return collection The counter section enabled.
     */
    public static function getCounterSectionEnabled()
    {
        $key = 'cms_counter_section_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::CounterSectionEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the counter section background from the CMS settings table.
     *
     * @return collection The counter section background.
     */
    public static function getCounterSectionBackground()
    {
        $key = 'cms_counter_section_background';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::CounterSectionBackground()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the active counter items.
     *
     * @return collection The active counter items.
     */
    public static function getActiveCounterItems()
    {
        return CounterItem::activeItems()->get();
    }

    /**
     * Gets the parsed counter items.
     *
     * @return array The parsed counter items.
     */
    public static function getParsedCounterItems()
    {
        $activeCounterItems = self::getActiveCounterItems();

        // Abstract into own method
        $counterItems = [];
        foreach ($activeCounterItems as $activeCounterItem) {
            $counterItems[] = self::parseCounterItem($activeCounterItem);
        }

        return $counterItems;
    }

    /**
     * Parse the diffferent types of counter items.
     *
     * @param array $item The item
     *
     * @return array
     */
    public static function parseCounterItem($item)
    {
        $itemType = $item->counterType->type;

        if ($itemType == 'custom') {
            return $item;
        }

        $itemVendor = null;
        if ($item->vendor) {
            $itemVendor = $item->vendor;
        }

        if ($itemType == 'packagistVendorPackagesCount') {
            $item->number = PackagistApiServices::getVendorPackagesCount($itemVendor);
        }

        if ($itemType == 'packagistVendorsTotalDownloads') {
            $packagistVendorsTotalDownloads = PackagistApiServices::getVendorsTotalDownloads($itemVendor);
            $item->number = $packagistVendorsTotalDownloads;
            $item->increment = $packagistVendorsTotalDownloads / 500;
        }

        return $item;
    }
}

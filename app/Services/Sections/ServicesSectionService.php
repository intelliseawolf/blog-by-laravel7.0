<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\ServiceItem;
use App\Services\CmsServices;

class ServicesSectionService extends CmsServices
{
    /**
     * Gets the services data.
     *
     * @return array The services data.
     */
    public function getSectionData()
    {
        $serviceSection         = self::getCmsServicesSection();
        $serviceSectionTitle    = self::getCmsServicesSectionTitle();

        return [
            'enabled'               => $serviceSection->active,
            'navTitle'              => $serviceSection->value,
            'sectionTitleEnabled'   => $serviceSectionTitle->active,
            'sectionTitle'          => $serviceSectionTitle->value,
            'bsClass'               => "col-sm-6 col-md-3",
            'items'                 => self::getCmsServiceItems(),
        ];
    }

    /**
     * Gets the Section Enabled from the database.
     *
     * @return collection.
     */
    public static function getCmsServicesSection()
    {
        $key = 'cms_services_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ServicesSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Section Enabled from the database.
     *
     * @return collection.
     */
    public static function getCmsServicesSectionTitle()
    {
        $key = 'cms_services_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ServicesSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the services items from the database.
     *
     * @return array The service items.
     */
    public static function getCmsServiceItems()
    {
        $key = 'cms_service_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = ServiceItem::ActiveItems()->SortedItems()->get();
        self::storeInCache($key, $item);

        return $item;
    }
}

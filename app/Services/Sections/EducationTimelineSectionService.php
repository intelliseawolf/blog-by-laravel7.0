<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\TimelineItem;
use App\Services\CmsServices;

class EducationTimelineSectionService extends CmsServices
{
    /**
     * Gets the education timeline data.
     */
    public function getSectionData($enabled = true)
    {
        $items = TimelineItem::allEnabledItemsByType('education')->get();

        $educationTimelineSectionData = self::getEducationTimelineSection();
        $timelineItems = self::getEducationTimelineItems();
        $sectionCssClassData = self::getEducationTimelineSectionCssClass();
        $sectionCssClass = '';

        if ($sectionCssClassData->active) {
            $sectionCssClass = $sectionCssClassData->value;
        }

        return [
            'enabled'       => $educationTimelineSectionData->active,
            'sectionTitle'  => $educationTimelineSectionData->value,
            'sectionClass'  => $sectionCssClass,
            'items'         => $timelineItems,
        ];
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection.
     */
    public function getEducationTimelineSection()
    {
        $key = 'cms_education_timeline_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::EducationTimelineSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section css class from the CMS Settings table.
     *
     * @return collection.
     */
    public function getEducationTimelineSectionCssClass()
    {
        $key = 'cms_education_timeline_section_css_class';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::EducationTimelineSectionCssClass()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Get the education timeline items from the database.
     *
     * @return collection
     */
    public function getEducationTimelineItems()
    {
        $key = 'education_timeline_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $items = TimelineItem::allEnabledItemsByType('education')->get();
        self::storeInCache($key, $items);

        return $items;
    }
}

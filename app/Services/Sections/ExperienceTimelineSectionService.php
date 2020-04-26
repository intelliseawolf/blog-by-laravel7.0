<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\TimelineItem;
use App\Services\CmsServices;

class ExperienceTimelineSectionService extends CmsServices
{
    /**
     * Gets the experience timeline data.
     */
    public function getSectionData($enabled = true)
    {
        $experienceTimelineSectionData = self::getExperienceTimelineSection();
        $timelineItems = self::getExperienceTimelineItems();
        $sectionCssClassData = self::getExperienceTimelineSectionCssClass();
        $sectionCssClass = '';

        if ($sectionCssClassData->active) {
            $sectionCssClass = $sectionCssClassData->value;
        }

        return [
            'enabled'       => $experienceTimelineSectionData->active,
            'sectionTitle'  => $experienceTimelineSectionData->value,
            'sectionClass'  => $sectionCssClass,
            'items'         => $timelineItems,
        ];
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection.
     */
    public function getExperienceTimelineSection()
    {
        $key = 'cms_experience_timeline_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ExperienceTimelineSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section css class from the CMS Settings table.
     *
     * @return collection.
     */
    public function getExperienceTimelineSectionCssClass()
    {
        $key = 'cms_experience_timeline_section_css_class';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ExperienceTimelineSectionCssClass()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Get the experience timeline items from the database.
     *
     * @return collection
     */
    public function getExperienceTimelineItems()
    {
        $key = 'experience_timeline_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $items = TimelineItem::allEnabledItemsByType('experience')->get();
        self::storeInCache($key, $items);

        return $items;
    }
}

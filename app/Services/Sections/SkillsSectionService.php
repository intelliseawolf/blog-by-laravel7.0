<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\SkillItem;
use App\Services\CmsServices;

class SkillsSectionService extends CmsServices
{
    /**
     * Gets the skills data.
     *
     * @return array The skills data.
     */
    public function getSectionData()
    {
        $skillsTitle     = '';
        $skillsTitleData = self::getCmsSkillSectionTitle();

        if($skillsTitleData->active) {
            $skillsTitle = $skillsTitleData->value;
        }

        return [
            'enabled'       => self::getCmsSkillSectionActive(),
            'titleEnabled'  => $skillsTitleData->active,
            'title'         => $skillsTitle,
            'items'         => self::getCmsSkillItems(),
        ];
    }

    /**
     * Gets the skill section active from the database.
     *
     * @return array The skill section active.
     */
    public static function getCmsSkillSectionActive()
    {
        $key = 'cms_skill_section_active';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::SkillsSectionActive()->pluck('active')->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the skill section title from the database.
     *
     * @return array The skill section title.
     */
    public static function getCmsSkillSectionTitle()
    {
        $key = 'cms_skill_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::SkillsSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the skills items from the database.
     *
     * @return array The skill items.
     */
    public static function getCmsSkillItems()
    {
        $key = 'cms_skill_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = SkillItem::ActiveItems()->SortedItems()->get();
        self::storeInCache($key, $item);

        return $item;
    }
}

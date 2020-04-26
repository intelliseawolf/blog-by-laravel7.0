<?php

namespace App\Services\Sections;

use App\Models\AboutSectionButton;
use App\Models\CmsSetting;
use App\Services\CmsServices;

class AboutSectionService extends CmsServices
{
    /**
     * Gets the about data.
     *
     * @return array The about data.
     */
    public function getSectionData()
    {
        $aboutSectionIntro = '';
        $aboutSectionText = '';

        $aboutSection = self::getCmsAboutSection();
        $aboutSectionTitle = self::getCmsAboutSectionTitle();

        $aboutSectionIntroData = self::getCmsAboutSectionIntro();
        $aboutSectionTextData = self::getCmsAboutSectionText();
        $buttons = self::getCmsAboutButtons();

        if ($aboutSectionIntroData->active) {
            $aboutSectionIntro = $aboutSectionIntroData->value;
        }
        if ($aboutSectionTextData->active) {
            $aboutSectionText = $aboutSectionTextData->value;
        }

        return [
            'enabled'       => $aboutSection->active,
            'titleEnabled'  => $aboutSectionTitle->active,
            'aboutButtons'  => true,
            'navTitle'      => $aboutSection->value,
            'intro'         => $aboutSectionIntro,
            'textTitle'     => $aboutSectionTitle->value,
            'text'          => $aboutSectionText,
            'buttons'       => $buttons,
        ];
    }

    /**
     * Gets the Section Enabled from the database.
     *
     * @return collection.
     */
    public static function getCmsAboutSection()
    {
        $key = 'cms_intro_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::AboutSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Section Title from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsAboutSectionTitle()
    {
        $key = 'cms_about_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::AboutSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Section Intro from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsAboutSectionIntro()
    {
        $key = 'cms_about_section_intro';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::AboutSectionIntro()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Section Text from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsAboutSectionText()
    {
        $key = 'cms_about_section_text';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::AboutSectionText()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the intro text items from the database.
     *
     * @return array The intro text items.
     */
    public static function getCmsAboutButtons()
    {
        $key = 'cms_about_buttons';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = AboutSectionButton::ActiveItems()->SortedItems()->get();
        self::storeInCache($key, $item);

        return $item;
    }
}

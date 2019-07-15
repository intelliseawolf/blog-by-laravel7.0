<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Models\IntroTypingTextItem;
use App\Services\CmsServices;

class IntroSectionService extends CmsServices
{
    /**
     * Gets the intro data.
     *
     * @return     array  The intro data.
     */
    public function getSectionData()
    {
        $introSection           = self::getCmsIntroSection();
        $scrollHtml             = self::getCmsIntroSectionScrollHtml();
        $introBackground        = self::getCmsIntroSectionBackground();
        $introBgImage           = '';
        $introSectionStaticText = self::getCmsIntroSectionStaticText();
        $introStaticText        = '';

        if ($introBackground->active) {
            $introBgImage = $introBackground->value;
        }

        if ($introSectionStaticText->active) {
            $introStaticText = $introSectionStaticText->value;
        }

        return [
            'enabled'           => $introSection->active,
            'particlesEnabled'  => self::getCmsIntroSectionParticlesEnabled(),
            'scrollHtmlEnabled' => $scrollHtml->active,
            'navTitle'          => $introSection->value,
            'downText'          => $scrollHtml->value,
            'bgImage'           => $introBgImage,
            'introStaticText'   => $introStaticText,
            'speed'             => self::getCmsIntroSectionTextSpeed()->value,
            'introTypeingText'  => self::getCmsIntroTextItems(),
        ];
    }

    /**
     * Gets the Intro Section Enabled from the database.
     *
     * @return collection.
     */
    public static function getCmsIntroSection()
    {
        $key = 'cms_intro_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::IntroSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Intro Section Enabled from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionParticlesEnabled()
    {
        $key = 'cms_intro_particles';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::IntroSectionParticlesEnabled()->pluck('active')->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Intro Section Scroll Html from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionScrollHtml()
    {
        $key = 'cms_intro_scroll_html';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::IntroSectionScrollHtml()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Intro Section Background from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionBackground()
    {
        $key = 'cms_intro_background';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::IntroSectionBackground()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Intro Section Static Text from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionStaticText()
    {
        $key = 'cms_intro_static_text';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::IntroSectionStaticText()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the Intro Section Text Speed from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionTextSpeed()
    {
        $key = 'cms_intro_text_speed';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::IntroSectionTextSpeed()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the intro text items from the database.
     *
     * @return array The intro text items.
     */
    public static function getCmsIntroTextItems()
    {
        $key = 'cms_intro_text_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = IntroTypingTextItem::ActiveItems()->get()->pluck('value');
        self::storeInCache($key, $item);

        return $item;
    }

}

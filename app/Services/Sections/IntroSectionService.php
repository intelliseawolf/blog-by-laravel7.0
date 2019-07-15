<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
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
            'introTypeingText'  => [
                "Engineering Manager",
                "Software Engineer",
                "Open Source Advocate",
                "Laravel Enthusiast",
            ],
        ];
    }

    /**
     * Gets the Intro Section Enabled from the database.
     *
     * @return collection.
     */
    public static function getCmsIntroSection()
    {
        $cachedItem = 'cms_intro_section';

        if (self::checkIfItemIsCached($cachedItem)) {
            return self::getFromCache($cachedItem);
        }

        $introSection = CmsSetting::IntroSection()->first();;
        self::storeInCache($cachedItem, $introSection);

        return $introSection;
    }

    /**
     * Gets the Intro Section Enabled from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionParticlesEnabled()
    {
        return CmsSetting::IntroSectionParticlesEnabled()->pluck('active')->first();
    }

    /**
     * Gets the Intro Section Scroll Html from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionScrollHtml()
    {
        return CmsSetting::IntroSectionScrollHtml()->first();
    }

    /**
     * Gets the Intro Section Background from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionBackground()
    {
        return CmsSetting::IntroSectionBackground()->first();
    }

    /**
     * Gets the Intro Section Static Text from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionStaticText()
    {
        return CmsSetting::IntroSectionStaticText()->first();
    }

    /**
     * Gets the Intro Section Text Speed from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsIntroSectionTextSpeed()
    {
        return CmsSetting::IntroSectionTextSpeed()->first();
    }

}

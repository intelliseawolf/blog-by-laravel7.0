<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Services\CmsServices;

class LogoService extends CmsServices
{
    /**
     * Gets the logo text.
     *
     * @return string The logo text.
     */
    public function getSectionData()
    {
        return self::getLogoText();
    }

    /**
     * Gets the logo text from the database or config.
     *
     * @return string The logo text.
     */
    public static function getLogoText()
    {
        $cachedItem = 'logo_settings';

        if (self::checkIfItemIsCached($cachedItem)) {
            $logoSettings = self::getFromCache($cachedItem);
        } else {
            $logoSettings = CmsSetting::logoText()->first();
            self::storeInCache($cachedItem, $logoSettings);
        }

        if ($logoSettings->active) {
            return $logoSettings->value;
        }

        return config('app.name', 'JK');
    }
}

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
        $key = 'logo_settings';

        if (self::checkIfItemIsCached($key)) {
            $item = self::getFromCache($key);
        } else {
            $item = CmsSetting::logoText()->first();
            self::storeInCache($key, $item);
        }

        if ($item->active) {
            return $item->value;
        }

        return config('app.name', 'JK');
    }
}

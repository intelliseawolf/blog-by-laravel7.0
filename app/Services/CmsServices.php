<?php

namespace App\Services;

use App\Models\CmsSetting;
use Illuminate\Support\Facades\Cache;

class CmsServices
{
    /**
     * Gets the Cache Enabled from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsCachingEnabled()
    {
        return CmsSetting::CmsCaching()->pluck('active')->first();
    }

    /**
     * Gets the Cache Time from the database.
     *
     * @return string The logo text.
     */
    public static function getCmsCachingTime()
    {
        return CmsSetting::CmsCaching()->pluck('value')->first();
    }

    /**
     * Check if packagist vendor list exists in the cache.
     *
     * @return bool
     */
    public static function checkIfItemIsCached($key = null)
    {
        $cachingEnabled = self::getCmsCachingEnabled();

        if (!$cachingEnabled) {
            return false;
        }

        if (Cache::has($key)) {
            return true;
        }
        return false;
    }

    /**
     * Gets the from cache.
     *
     * @param string $item   The item
     *
     * @return From The from cache.
     */
    public static function getFromCache($item)
    {
        return Cache::get($item);
    }

    /**
     * Stores in cache.
     *
     * @param string    $key    The key
     * @param multi     $value  The value
     */
    public static function storeInCache($key, $value)
    {
        $cachingEnabled = self::getCmsCachingEnabled();

        if (!$cachingEnabled) {
            return false;
        }

        Cache::put($key, $value, self::getCmsCacheTime());
    }

    /**
     * Gets CMS cache time.
     *
     * @param int $minutes The Minutes (optional)
     *
     * @return cache time.
     */
    public static function getCmsCacheTime($minutes = null)
    {
        if ($minutes === null) {
            $minutes = self::getCmsCachingTime();
        }
        return now()->addMinutes($minutes);
    }
}

<?php

namespace App\Services\Sections;

use App\Models\SocialMediaItem;
use App\Models\CmsSetting;
use App\Services\CmsServices;

class AboutSectionService extends CmsServices
{
    /**
     * Gets the footer data.
     *
     * @return array  The footer data.
     */
    public function getSectionData()
    {
        return [
            'enabled' => self::getFooterEnabled()->active,
            'phone' => [
                'enabled'   => self::getFooterPhoneEnabled()->active,
                'icon'      => config('portfolio.footer.phoneIcon'),
                'text'      => config('portfolio.contact.phone.string'),
                'link'      => config('portfolio.contact.phone.link'),
            ],
            'email' => [
                'enabled'   => self::getFooterEmailEnabled()->active,
                'icon'      => config('portfolio.footer.emailIcon'),
                'text'      => config('portfolio.contact.email.string'),
                'link'      => config('portfolio.contact.email.link'),
            ],
            'copyright' => self::getFooterCopyright()->value,
            'socialmedia' => [
                'items' => self::getAllEnabledItemsSorted(),
            ],
        ];
    }

    /**
     * Gets the footer Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getFooterEnabled()
    {
        $key = 'cms_footer_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::FooterEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Get the social media items from the database
     *
     * @return collection
     */
    public static function getAllEnabledItemsSorted()
    {
        $key = 'social_media_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $items = SocialMediaItem::allEnabledItemsSorted()->get();
        self::storeInCache($key, $items);

        return $items;
    }

    /**
     * Gets the footer copyright from the database.
     *
     * @return collection.
     */
    public static function getFooterCopyright()
    {
        $key = 'cms_footer_copyright';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::FooterCopyright()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the footer phone enabled from the database.
     *
     * @return collection.
     */
    public static function getFooterPhoneEnabled()
    {
        $key = 'cms_footer_phone_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::FooterPhoneEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the footer phone enabled from the database.
     *
     * @return collection.
     */
    public static function getFooterEmailEnabled()
    {
        $key = 'cms_footer_email_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::FooterEmailEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }
}

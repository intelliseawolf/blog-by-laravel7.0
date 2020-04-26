<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Services\CmsServices;

class ContactSectionService extends CmsServices
{
    /**
     * Gets the contact data.
     *
     * @return array The contact data.
     */
    public function getSectionData()
    {
        $contactSectionData = self::getContactSection();
        $contactSectionTitleData = self::getContactSectionTitle();
        $contactSectionTextTitleData = self::getContactSectionTextTitle();
        $contactSectionTextData = self::getContactSectionText();

        $contactSectionTitle = '';
        $contactSectionTextTitle = '';
        $contactSectionText = '';

        if ($contactSectionTitleData->active) {
            $contactSectionTitle = $contactSectionTitleData->value;
        }

        if ($contactSectionTextTitleData->active) {
            $contactSectionTextTitle = $contactSectionTextTitleData->value;
        }

        if ($contactSectionTextData->active) {
            $contactSectionText = $contactSectionTextData->value;
        }

        return [
            'enabled'       => $contactSectionData->active,
            'navTitle'      => $contactSectionData->value,
            'sectionTitle'  => $contactSectionTitle,
            'textTitle'     => $contactSectionTextTitle,
            'textContent'   => $contactSectionText,
            'phone'         => [
                'enabled'   => self::getContactSectionPhoneEnabled()->active,
                'icon'      => config('portfolio.contact.phone.icon'),
                'text'      => config('portfolio.contact.phone.string'),
                'link'      => config('portfolio.contact.phone.link'),
            ],
            'email' => [
                'enabled'   => self::getContactSectionEmailEnabled()->active,
                'icon'      => config('portfolio.contact.email.icon'),
                'text'      => config('portfolio.contact.email.string'),
                'link'      => config('portfolio.contact.email.link'),
            ],
            'time' => [
                'enabled'   => self::getContactSectionTimeEnabled()->active,
                'icon'      => config('portfolio.contact.time.icon'),
                'text'      => config('portfolio.contact.time.string'),
            ],
            'location' => [
                'enabled'   => self::getContactSectionLocationEnabled()->active,
                'icon'      => config('portfolio.contact.location.icon'),
                'text'      => config('portfolio.contact.location.string'),
            ],
            'form' => [
                'enabled' => self::getContactSectionContactFormEnabled()->active,
                'labels'  => [
                    'name'      => trans('portfolio.contactForm.labels.name'),
                    'email'     => trans('portfolio.contactForm.labels.email'),
                    'subject'   => trans('portfolio.contactForm.labels.subject'),
                    'message'   => trans('portfolio.contactForm.labels.message'),
                ],
                'messages' => [
                    'successMsg'        => trans('portfolio.contactForm.messages.successMsg'),
                    'serverErrorMsg'    => trans('portfolio.contactForm.messages.serverErrorMsg'),
                ],
                'submitButton' => trans('portfolio.contactForm.submitButton'),
            ],
        ];
    }

    /**
     * Gets the section Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSection()
    {
        $key = 'cms_contact_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionTitle()
    {
        $key = 'cms_contact_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Text Title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionTextTitle()
    {
        $key = 'cms_contact_section_text_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionTextTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Text Title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionText()
    {
        $key = 'cms_contact_section_text_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionText()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Phone Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionPhoneEnabled()
    {
        $key = 'cms_contact_section_phone_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionPhoneEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Email Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionEmailEnabled()
    {
        $key = 'cms_contact_section_email_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionEmailEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Tile Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionTimeEnabled()
    {
        $key = 'cms_contact_section_time_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionTimeEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Location Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionLocationEnabled()
    {
        $key = 'cms_contact_section_location_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionLocationEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Contact Form Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getContactSectionContactFormEnabled()
    {
        $key = 'cms_contact_section_contact_form_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::ContactSectionContactFormEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }
}

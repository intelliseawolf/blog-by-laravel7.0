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
        $contactSectionData         = self::getContactSection();
        $contactSectionTitleData    = self::getContactSectionTitle();
        $contactSectionTitle        = '';

        if ($contactSectionTitleData->active) {
            $contactSectionTitle = $contactSectionTitleData->value;
        }

        return [
            'enabled'       => $contactSectionData->active,
            'navTitle'      => $contactSectionData->value,
            'sectionTitle'  => $contactSectionTitle,
            'textTitle'     => 'Feel free to contact me!',
            'textContent'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, quasi unde quisquam facilis at ullam aperiam similique dicta voluptatibus!',
            'phone' => [
                'enabled'   => true,
                'icon'      => 'fa-phone',
                'text'      => '503.619.6366',
                'link'      => 'tel:1-503-619-6366',
            ],
            'email' => [
                'enabled'   => true,
                'icon'      => 'fa-envelope',
                'text'      => 'jeremykenedy@gmail.com',
                'link'      => 'mailto:jeremykenedy@gmail.com',
            ],
            'time' => [
                'enabled'   => true,
                'icon'      => 'fa-clock-o',
                'text'      => 'Pacific Standard Time',
            ],
            'location' => [
                'enabled'   => true,
                'icon'      => 'fa-map-marker',
                'text'      => 'Portland, OR, USA',
            ],
            'form' => [
                'labels'  => [
                    'name'      => 'Name*',
                    'email'     => 'Email*',
                    'subject'   => 'Subject',
                    'message'   => 'Type your message here*',
                ],
                'messages' => [
                    'successMsg'        => 'Your message was sent!',
                    'serverErrorMsg'    => 'Server error',
                ],
                'submitButton' => 'Send message',
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
     * Gets the section Enabled from the CMS Settings table.
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

}

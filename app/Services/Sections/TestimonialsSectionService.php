<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Services\CmsServices;
use App\Traits\TestimonialsDataTrait;

class TestimonialsSectionService extends CmsServices
{
    use TestimonialsDataTrait;

    /**
     * Gets the testimonials data.
     *
     * @return array The testimonials data.
     */
    public function getSectionData()
    {
        $testimonialItems = self::getTestimonialItems();
        $testimonialTitleData = self::getTestimonialSectionTitle();
        $testimonialTitle = '';

        if ($testimonialTitleData->active) {
            $testimonialTitle = $testimonialTitleData->value;
        }

        return [
            'enabled'       => self::getTestimonialSectionEnabled(),
            'sectionTitle'  => $testimonialTitle,
            'items'         => $testimonialItems,
        ];
    }

    /**
     * Gets the section Enabled from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getTestimonialSectionEnabled()
    {
        $key = 'cms_testimonials_section_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::TestimonialSectionEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getTestimonialSectionTitle()
    {
        $key = 'cms_testimonial_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::TestimonialSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the testimonial items.
     *
     * @return array The testimonial items.
     */
    public static function getTestimonialItems()
    {
        $key = 'testimonial_section_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $items = self::getEnabledTestimonialsItems();
        self::storeInCache($key, $items);

        return $items;
    }
}

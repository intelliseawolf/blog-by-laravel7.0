<?php

namespace App\Services\Sections;

use App\Traits\TestimonialsDataTrait;

class TestimonialsSectionService
{
    use TestimonialsDataTrait;

    /**
     * Gets the testimonials data.
     *
     * @return array The testimonials data.
     */
    public function getSectionData()
    {
        $sectionData = $this->getTestimonialSectionData();

        return [
            'enabled'       => $sectionData['sectionEnabled'],
            'sectionTitle'  => $sectionData['sectionTItle'],
            'items'         => $sectionData['seciontItems'],
        ];
    }
}

<?php

namespace App\Traits;

use App\Models\Testimonial;

trait TestimonialsDataTrait
{
    /**
     * Gets the testimonial section data.
     *
     * @return array  The testimonial section data.
     */
    public function getTestimonialSectionData()
    {
        return [
            'sectionEnabled'    => true,
            'sectionTItle'      => 'What people are saying',
            'seciontItems'      => $this->getEnabledTestimonialsItems(),
        ];
    }

    /**
     * Get all enabled testimonial items.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEnabledTestimonialsItems()
    {
        return Testimonial::all()->where('enabled', 1);
    }

}

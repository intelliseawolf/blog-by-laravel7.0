<?php

namespace App\Traits;

use App\Models\Testimonial;

trait TestimonialsDataTrait
{
    /**
     * Get all enabled testimonial items.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getEnabledTestimonialsItems()
    {
        return Testimonial::all()->where('enabled', 1);
    }
}

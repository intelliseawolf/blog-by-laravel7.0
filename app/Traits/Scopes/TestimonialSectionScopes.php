<?php

namespace App\Traits\Scopes;

trait TestimonialSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTestimonialSectionEnabled($query)
    {
        return $query->where('key', 'testimonial_section_enabled');
    }

    /**
     * Scope a query to get the Section Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTestimonialSectionTitle($query)
    {
        return $query->where('key', 'testimonial_section_title');
    }
}

<?php

namespace App\Traits\Scopes;

trait ServiceScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeServicesSection($query)
    {
        return $query->where('key', 'services_section');
    }

    /**
     * Scope a query to get the Services Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeServicesSectionTitle($query)
    {
        return $query->where('key', 'services_section_title');
    }
}

<?php

namespace App\Traits\Scopes;

trait ContactSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSection($query)
    {
        return $query->where('key', 'contact_section');
    }

    /**
     * Scope a query to get the Section Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionTitle($query)
    {
        return $query->where('key', 'contact_section_title');
    }
}

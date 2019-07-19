<?php

namespace App\Traits\Scopes;

trait CounterItemScopes
{
    /**
     * Scope a query to get the Section Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCounterSectionEnabled($query)
    {
        return $query->where('key', 'counter_section_enabled');
    }

    /**
     * Scope a query to get the Section Background from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCounterSectionBackground($query)
    {
        return $query->where('key', 'counter_section_background');
    }
}

<?php

namespace App\Traits\Scopes;

trait AboutScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAboutSection($query)
    {
        return $query->where('key', 'about_section');
    }

    /**
     * Scope a query to get the Section Enabled and Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAboutSectionTitle($query)
    {
        return $query->where('key', 'about_section_title');
    }

    /**
     * Scope a query to get the Section Intro from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAboutSectionIntro($query)
    {
        return $query->where('key', 'about_section_intro');
    }

    /**
     * Scope a query to get the Section Text from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAboutSectionText($query)
    {
        return $query->where('key', 'about_section_text');
    }
}

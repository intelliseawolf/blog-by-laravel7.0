<?php

namespace App\Traits\Scopes;

trait EducationTimelineSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEducationTimelineSection($query)
    {
        return $query->where('key', 'education_timeline_section');
    }

    /**
     * Scope a query to get the Section CSS Class from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEducationTimelineSectionCssClass($query)
    {
        return $query->where('key', 'education_timeline_section_css_class');
    }
}

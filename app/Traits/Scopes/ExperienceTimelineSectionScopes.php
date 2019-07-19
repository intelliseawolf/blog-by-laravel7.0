<?php

namespace App\Traits\Scopes;

trait ExperienceTimelineSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExperienceTimelineSection($query)
    {
        return $query->where('key', 'experience_timeline_section');
    }

    /**
     * Scope a query to get the Section CSS Class from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExperienceTimelineSectionCssClass($query)
    {
        return $query->where('key', 'experience_timeline_section_css_class');
    }
}

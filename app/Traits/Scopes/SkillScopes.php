<?php

namespace App\Traits\Scopes;

trait SkillScopes
{
    /**
     * Scope a query to get the Skills Section Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSkillsSectionActive($query)
    {
        return $query->where('key', 'skills_section_enabled');
    }

    /**
     * Scope a query to get the Skills Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSkillsSectionTitle($query)
    {
        return $query->where('key', 'skills_section_title');
    }
}

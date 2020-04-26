<?php

namespace App\Traits\Scopes;

trait BlogSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlogSection($query)
    {
        return $query->where('key', 'blog_section');
    }

    /**
     * Scope a query to get the Section Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlogSectionTitle($query)
    {
        return $query->where('key', 'blog_section_title');
    }

    /**
     * Scope a query to get the Section Limit from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlogSectionLimit($query)
    {
        return $query->where('key', 'blog_section_limit');
    }

    /**
     * Scope a query to get the Section See More Button from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlogSectionSeeMoreButton($query)
    {
        return $query->where('key', 'blog_section_see_more_button');
    }
}

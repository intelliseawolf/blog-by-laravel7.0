<?php

namespace App\Traits\Scopes;

trait PortfolioSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolioSection($query)
    {
        return $query->where('key', 'portfolio_section');
    }

    /**
     * Scope a query to get the Section Limit from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolioSectionLimit($query)
    {
        return $query->where('key', 'portfolio_section_limit');
    }

    /**
     * Scope a query to get the Section Lightbox enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolioSectionLightboxEnabled($query)
    {
        return $query->where('key', 'portfolio_section_lightbox_enabled');
    }

    /**
     * Scope a query to get the Section Spacing enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolioSectionSpacingEnabled($query)
    {
        return $query->where('key', 'portfolio_section_spacing_enabled');
    }

    /**
     * Scope a query to get the Section Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolioSectionTitle($query)
    {
        return $query->where('key', 'portfolio_section_section_title');
    }

    /**
     * Scope a query to get the Section See More Button from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolioSectionSeeMoreButton($query)
    {
        return $query->where('key', 'portfolio_section_see_more_button');
    }
}

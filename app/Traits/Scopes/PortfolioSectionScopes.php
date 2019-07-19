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
}

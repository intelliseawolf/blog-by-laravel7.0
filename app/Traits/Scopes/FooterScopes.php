<?php

namespace App\Traits\Scopes;

trait FooterScopes
{
    /**
     * Scope a query to get the Footer Section Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFooterEnabled($query)
    {
        return $query->where('key', 'footer_enabled');
    }

    /**
     * Scope a query to get the Footer Copyright from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFooterCopyright($query)
    {
        return $query->where('key', 'footer_copyright');
    }

    /**
     * Scope a query to get the Footer Phone Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFooterPhoneEnabled($query)
    {
        return $query->where('key', 'footer_phone_enabled');
    }

    /**
     * Scope a query to get the Footer Email Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFooterEmailEnabled($query)
    {
        return $query->where('key', 'footer_email_enabled');
    }
}

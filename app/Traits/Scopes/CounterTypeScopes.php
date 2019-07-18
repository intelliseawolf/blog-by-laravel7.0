<?php

namespace App\Traits\Scopes;

trait CounterTypeScopes
{
    /**
     * Scope a query to get counter type custom from the counter type table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCounterTypeCustom($query)
    {
        return $query->where('type', 'custom');
    }

    /**
     * Scope a query to get counter type packagistVendorPackagesCount from the counter type table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCounterTypePackagistVendorPackagesCount($query)
    {
        return $query->where('type', 'packagistVendorPackagesCount');
    }

    /**
     * Scope a query to get counter type packagistVendorsTotalDownloads from the counter type table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCounterTypePackagistVendorsTotalDownloads($query)
    {
        return $query->where('type', 'packagistVendorsTotalDownloads');
    }
}

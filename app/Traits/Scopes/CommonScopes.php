<?php

namespace App\Traits\Scopes;

trait CommonScopes
{
    /**
     * Scope active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActiveItems($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Scope active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortedItems($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}

<?php

namespace App\Models;

use App\Traits\Scopes\CommonScopes;
use App\Traits\Scopes\ServiceScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceItem extends Model
{
    use CommonScopes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_items';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'name',
        'text',
        'icon',
        'sort_order'
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'active'     => 'boolean',
        'name'       => 'string',
        'text'       => 'string',
        'icon'       => 'string',
        'sort_order' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

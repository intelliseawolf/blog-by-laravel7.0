<?php

namespace App\Models;

use App\Traits\Scopes\CommonScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CounterItem extends Model
{
    use CommonScopes;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'counter_items';

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
        'type_id',
        'title',
        'number',
        'increment',
        'icon',
        'link',
        'vendor',
        'repository',
        'sort_order',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'active'     => 'boolean',
        'type_id'    => 'integer',
        'title'      => 'string',
        'number'     => 'integer',
        'increment'  => 'integer',
        'icon'       => 'string',
        'link'       => 'string',
        'vendor'     => 'string',
        'repository' => 'string',
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

    /**
     * The counter type that belongs to the counter item.
     *
     * @return belongsTo
     */
    public function counterType()
    {
        return $this->belongsTo('App\Models\CounterType', 'type_id', 'id');
    }
}

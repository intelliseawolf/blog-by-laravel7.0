<?php

namespace App\Models;

use App\Traits\Scopes\CommonScopes;
use App\Traits\Scopes\CounterTypeScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CounterType extends Model
{
    use CommonScopes;
    use CounterTypeScopes;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'counter_types';

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
        'type',
        'name',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'name' => 'string',
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
     * Get all of the counter items for the counter type.
     *
     * @return hasMany
     */
    public function counterItems()
    {
        return $this->hasMany('App\Models\CounterItem', 'type_id');
    }
}

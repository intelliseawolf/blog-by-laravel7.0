<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'testimonials';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Define the date field.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'enabled',
        'author',
        'content',
        'icon',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'enabled'   => 'boolean',
        'author'    => 'string',
        'content'   => 'string',
        'icon'      => 'string',
    ];

    /**
     * Scope a query to item marked as enabled.
     *
     * @return collection
     */
    public function scopeIsEnabled($query)
    {
        $query->where('enabled', 1);
    }
}

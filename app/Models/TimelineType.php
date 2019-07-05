<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimelineType extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timeline_types';

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
        'name',
        'slug',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'name'  => 'string',
        'slug'  => 'string',
    ];

    /**
     * Scope a query to get by name.
     *
     * @param string $slug
     *
     * @return collection
     */
    public function scopeByName($query, $name)
    {
        $query->whereName($name);
    }

    /**
     * Scope a query to get by slug.
     *
     * @param string $slug
     *
     * @return collection
     */
    public function scopeBySlug($query, $slug)
    {
        $query->whereSlug($slug);
    }

}

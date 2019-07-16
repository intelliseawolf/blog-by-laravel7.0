<?php

namespace App\Models;

use App\Traits\Scopes\CommonScopes;
use App\Traits\Scopes\SkillScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillItem extends Model
{
    use CommonScopes;
    use SkillScopes;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'skill_items';

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
        'percent',
        'sort_order',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'active'     => 'boolean',
        'name'       => 'string',
        'percent'    => 'integer',
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

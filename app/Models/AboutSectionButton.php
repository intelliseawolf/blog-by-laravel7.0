<?php

namespace App\Models;

use App\Traits\Scopes\CommonScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutSectionButton extends Model
{
    use CommonScopes;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_section_buttons';

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
        'link',
        'text',
        'delay',
        'target',
        'sort_order',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'active'        => 'boolean',
        'link'          => 'string',
        'text'          => 'string',
        'delay'         => 'string',
        'target'        => 'string',
        'sort_order'    => 'integer',
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

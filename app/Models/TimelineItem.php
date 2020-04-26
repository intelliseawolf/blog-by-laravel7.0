<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimelineItem extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timeline_items';

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
        'typeId',
        'sort_order',
        'icon',
        'dates',
        'title',
        'subtitle',
        'text',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'enabled'       => 'boolean',
        'type_id'       => 'integer',
        'sort_order'    => 'integer',
        'icon'          => 'string',
        'dates'         => 'string',
        'title'         => 'string',
        'subtitle'      => 'string',
        'text'          => 'string',
    ];

    /**
     * Scope a query to show all Portiolio Items marked as enabled.
     *
     * @return collection
     */
    public function scopeIsEnabled($query)
    {
        $query->where('enabled', 1);
    }

    /**
     * Scope a query byt sort order.
     *
     * @return collection
     */
    public function scopeSortOrder($query, $direction = 'desc')
    {
        $query->orderBy('sort_order', $direction);
    }

    /**
     * Scope a query to get by typeId.
     *
     * @param string $typeId
     *
     * @return collection
     */
    public function scopeByTypeId($query, $typeId)
    {
        $query->whereTypeId($typeId);
    }

    /**
     * Scope a query to get only enabled items by type.
     *
     * @return collection
     */
    public function scopeAllEnabledItemsByType($query, $type)
    {
        $timelineTypes = TimelineType::all();
        $typeId = '';

        foreach ($timelineTypes as $timelineType) {
            if ($timelineType->slug == $type) {
                $typeId = $timelineType->id;
            }
        }

        return $query->isEnabled()
            ->byTypeId($typeId)
            ->sortOrder();
    }
}

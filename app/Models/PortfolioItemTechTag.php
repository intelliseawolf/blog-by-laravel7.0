<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItemTechTag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'portfolio_item_tech_tags';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Tag.
     *
     * @var array
     */
    protected $fillable = [
        'tag',
        'title',
    ];

    /**
     * The many-to-many relationship between tech tags and portfolioItems.
     *
     * @return BelongsToMany
     */
    public function portfolioItems()
    {
        return $this->belongsToMany('App\Models\PortfolioItem', 'portfolio_item_tech_tag_pivot');
    }

    /**
     * Return a tag link.
     *
     * @param string $base
     *
     * @return string
     */
    public function link($base = '/?tag=%TAG%')
    {
        $url = str_replace('%TAG%', urlencode($this->tag), $base);
        $tagLink = '<a href="'.$url.'">'.e($this->tag).'</a>';

        return $tagLink;
    }

    /**
     * Add any tags needed from the list.
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTechTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->pluck('tag')->all();

        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag'               => $tag,
                'title'             => $tag,
            ]);
        }
    }
}

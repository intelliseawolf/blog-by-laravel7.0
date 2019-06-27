<?php

namespace App\Models;

use App\Services\Markdowner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class PortfolioItem extends Model implements Feedable
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'portfolio_items';

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
        'slug',
        'title',
        'subtitle',
        'content_raw',
        'content_html',
        'item_image',
        'item_image_large',
        'project_link_enabled',
        'project_link',
        'meta_description',
        'enabled',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'slug'                  => 'string',
        'title'                 => 'string',
        'subtitle'              => 'string',
        'content_raw'           => 'string',
        'content_html'          => 'string',
        'item_image'            => 'string',
        'item_image_large'      => 'string',
        'project_link_enabled'  => 'boolean',
        'project_link'          => 'string',
        'meta_description'      => 'string',
        'enabled'               => 'boolean',
    ];

    /**
     * The many-to-many relationship between pages and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\PortfolioItemTag', 'portfolio_item_tag_pivot');
    }

    /**
     * The many-to-many relationship between pages and tags.
     *
     * @return BelongsToMany
     */
    public function techTags()
    {
        return $this->belongsToMany('App\Models\PortfolioItemTechTag', 'portfolio_item_tech_tag_pivot');
    }

    /**
     * Set the title attribute and automatically the slug.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param string $title
     * @param mixed  $extra
     */
    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);

            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Set the HTML content automatically when the raw content is set.
     *
     * @param string $value
     */
    public function setContentRawAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);
    }

    /**
     * Sync tag relation adding new tags as needed.
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        PortfolioItemTag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                PortfolioItemTag::whereIn('tag', $tags)->pluck('id')->all()
            );

            return;
        }

        $this->tags()->detach();
    }

    /**
     * Sync tag relation adding new tags as needed.
     *
     * @param array $tags
     */
    public function syncTechTags(array $tags)
    {
        PortfolioItemTechTag::addNeededTechTags($tags);

        if (count($tags)) {
            $this->techTags()->sync(
                PortfolioItemTechTag::whereIn('tag', $tags)->pluck('id')->all()
            );

            return;
        }

        $this->techTags()->detach();
    }

    /**
     * Alias for content_raw.
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }

    /**
     * Alias for content_html.
     */
    public function getHtmlContentAttribute($value)
    {
        return $this->content_html;
    }

    /**
     * Return URL to page.
     *
     * @param PortfolioItemTag $tag
     *
     * @return string
     */
    public function url(PortfolioItemTag $tag = null)
    {
        $url = url('/'.$this->slug);
        if ($tag) {
            $url .= '?tag='.urlencode($tag->tag);
        }

        return $url;
    }

    /**
     * Return URL to page.
     *
     * @param PortfolioItemTag $tag
     *
     * @return string
     */
    public function urlTech(PortfolioItemTechTag $tag = null)
    {
        $url = url('/'.$this->slug);
        if ($tag) {
            $url .= '?tag='.urlencode($tag->tag);
        }

        return $url;
    }

    /**
     * Return array of tag links.
     *
     * @param string $base
     *
     * @return array
     */
    public function tagLinks($base = '/?tag=%TAG%')
    {
        $tags = $this->tags()->pluck('tag')->all();
        $return = [];

        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a class="badge" href="'.$url.'">'.e($tag).'</a>';
        }

        return $return;
    }

    /**
     * Return array of tag links.
     *
     * @param string $base
     *
     * @return array
     */
    public function tagList($base = '/?tag=%TAG%')
    {
        $tags = $this->tags()->pluck('tag')->all();
        $return = [];

        foreach ($tags as $tag) {
            $return[] = e($tag);
        }

        return $return;
    }

    /**
     * Return array of tag links.
     *
     * @param string $base
     *
     * @return array
     */
    public function techTagLinks($base = '/?tag=%TAG%')
    {
        $techTags = $this->techTags()->pluck('tag')->all();
        $return = [];

        foreach ($techTags as $techTag) {
            $url = str_replace('%TAG%', urlencode($techTag), $base);
            $return[] = '<a class="badge" href="'.$url.'">'.e($techTag).'</a>';
        }

        return $return;
    }

    /**
     * Return array of tag links.
     *
     * @param string $base
     *
     * @return array
     */
    public function techTagList($base = '/?tag=%TAG%')
    {
        $techTags = $this->techTags()->pluck('tag')->all();
        $return = [];

        foreach ($techTags as $techTag) {
            $return[] = e($techTag);
        }

        return $return;
    }

    /**
     * Return next portfolioitem after this one or null.
     *
     * @param Tag $tag
     *
     * @return Post
     */
    public function newerPortfolioItem(PortfolioItemTag $tag = null)
    {
        $query = static::where('created_at', '>', $this->created_at)
                            ->where('enabled', 1)
                            ->orderBy('created_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    /**
     * Return older post before this one or null.
     *
     * @param Tag $tag
     *
     * @return Post
     */
    public function olderPublishedItem(PortfolioItemTag $tag = null)
    {
        $query = static::where('created_at', '<', $this->created_at)
                            ->where('enabled', 1)
                            ->orderBy('created_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    /**
     * Model RSS feed items to return.
     *
     * @return FeedItem
     */
    public function toFeedItem()
    {
        return FeedItem::create([
            'id'            => $this->id,
            'title'         => $this->title,
            'subtitle'      => $this->subtitle,
            'image'         => $this->item_image,
            'image_large'   => $this->item_image_large,
            'summary'       => $this->content_html,
            'updated'       => $this->updated_at,
            'link'          => $this->slug,
        ]);
    }

    /**
     * Get the feed items.
     *
     * @return collection
     */
    public static function getFeedItems()
    {
        return self::allPublishedPortfolioItems()->get();
    }

    /**
     * Scope a query to get only published portfolio items with tags.
     *
     * @return collection
     */
    public function scopeAllPublishedPortfolioItems($query)
    {
        return $query->with('tags')
            ->with('techTags')
            ->isEnabled()
            ->orderBy('created_at', 'desc');
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

    /**
     * Scope a query to show all Portiolio Items marked as enabled.
     *
     * @return collection
     */
    public function scopeIsEnabled($query)
    {
        $query->where('enabled', 1);
    }
}

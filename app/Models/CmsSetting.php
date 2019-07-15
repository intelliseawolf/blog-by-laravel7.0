<?php

namespace App\Models;

use App\Models\BlogSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsSetting extends BlogSetting
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_settings';

    /**
     * Scope a query to get CMS caching from settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCmsCaching($query)
    {
        return $query->where('key', 'cms_cache');
    }

    /**
     * Scope a query to get the Logo Text from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLogoText($query)
    {
        return $query->where('key', 'logo_text');
    }

    /**
     * Scope a query to get the Intro Section Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIntroSection($query)
    {
        return $query->where('key', 'intro_section');
    }

    /**
     * Scope a query to get the Intro Section Particles Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIntroSectionParticlesEnabled($query)
    {
        return $query->where('key', 'intro_section_particles_enabled');
    }

    /**
     * Scope a query to get the Intro Section Scroll Html from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIntroSectionScrollHtml($query)
    {
        return $query->where('key', 'intro_section_scroll_html');
    }

    /**
     * Scope a query to get the Intro Background from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIntroSectionBackground($query)
    {
        return $query->where('key', 'intro_section_background');
    }

    /**
     * Scope a query to get the Intro Static Text from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIntroSectionStaticText($query)
    {
        return $query->where('key', 'intro_section_static_text');
    }

    /**
     * Scope a query to get the Intro Text Speed from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIntroSectionTextSpeed($query)
    {
        return $query->where('key', 'intro_section_text_speed');
    }

}

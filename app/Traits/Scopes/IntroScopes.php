<?php

namespace App\Traits\Scopes;

trait IntroScopes
{
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

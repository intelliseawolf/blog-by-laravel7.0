<?php

namespace App\Traits\Scopes;

trait ContactSectionScopes
{
    /**
     * Scope a query to get the Section Enabled and Nav Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSection($query)
    {
        return $query->where('key', 'contact_section');
    }

    /**
     * Scope a query to get the Section Title from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionTitle($query)
    {
        return $query->where('key', 'contact_section_title');
    }

    /**
     * Scope a query to get the Section TextTitle from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionTextTitle($query)
    {
        return $query->where('key', 'contact_section_text_title');
    }

    /**
     * Scope a query to get the Section Text from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionText($query)
    {
        return $query->where('key', 'contact_section_text');
    }

    /**
     * Scope a query to get the Section Phone Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionPhoneEnabled($query)
    {
        return $query->where('key', 'contact_section_phone_enabled');
    }

    /**
     * Scope a query to get the Section Email Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionEmailEnabled($query)
    {
        return $query->where('key', 'contact_section_email_enabled');
    }

    /**
     * Scope a query to get the Section Time Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionTimeEnabled($query)
    {
        return $query->where('key', 'contact_section_time_enabled');
    }

    /**
     * Scope a query to get the Section Location Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionLocationEnabled($query)
    {
        return $query->where('key', 'contact_section_location_enabled');
    }

    /**
     * Scope a query to get the Section Contact Form Enabled from the CMS settings table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactSectionContactFormEnabled($query)
    {
        return $query->where('key', 'contact_section_form_enabled');
    }
}

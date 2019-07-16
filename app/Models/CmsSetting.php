<?php

namespace App\Models;

use App\Models\BlogSetting;
use App\Traits\Scopes\AboutScopes;
use App\Traits\Scopes\CommonScopes;
use App\Traits\Scopes\IntroScopes;
use App\Traits\Scopes\SkillScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsSetting extends BlogSetting
{
    use AboutScopes;
    use CommonScopes;
    use IntroScopes;
    use SkillScopes;

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

}

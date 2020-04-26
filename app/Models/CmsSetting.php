<?php

namespace App\Models;

use App\Traits\Scopes\AboutScopes;
use App\Traits\Scopes\BlogSectionScopes;
use App\Traits\Scopes\CommonScopes;
use App\Traits\Scopes\ContactSectionScopes;
use App\Traits\Scopes\CounterItemScopes;
use App\Traits\Scopes\EducationTimelineSectionScopes;
use App\Traits\Scopes\ExperienceTimelineSectionScopes;
use App\Traits\Scopes\FooterScopes;
use App\Traits\Scopes\IntroScopes;
use App\Traits\Scopes\PortfolioSectionScopes;
use App\Traits\Scopes\ServiceScopes;
use App\Traits\Scopes\SkillScopes;
use App\Traits\Scopes\TestimonialSectionScopes;
use Illuminate\Database\Eloquent\Model;

class CmsSetting extends BlogSetting
{
    use AboutScopes;
    use BlogSectionScopes;
    use CommonScopes;
    use ContactSectionScopes;
    use CounterItemScopes;
    use ExperienceTimelineSectionScopes;
    use EducationTimelineSectionScopes;
    use FooterScopes;
    use IntroScopes;
    use PortfolioSectionScopes;
    use ServiceScopes;
    use SkillScopes;
    use TestimonialSectionScopes;

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

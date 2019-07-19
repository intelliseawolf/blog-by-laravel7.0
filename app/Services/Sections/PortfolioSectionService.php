<?php

namespace App\Services\Sections;

use App\Models\CmsSetting;
use App\Services\CmsServices;
use Illuminate\Http\Request;
use Route;

class PortfolioSectionService extends CmsServices
{
    /**
     * Gets the portfolio data.
     *
     * @return     array    The portfolio data.
     */
    public function getSectionData()
    {
        // Temp until move to CMS settings table
        $spacing=false;
        $more=true;

        $portfolioSection = self::getPortfolioSection();
        $portfolioSectionLimit = self::getPortfolioSectionLimit()->value;

        $items = $this->getPortfolioItems();
        if (!$portfolioSectionLimit) {
            $portfolioSectionLimit = count($items);
        }

        return [
            'enabled'       => $portfolioSection->active,
            'spacing'       => $spacing,
            'lightBox'      => self::getPortfolioSectionLightboxEnabled()->active,
            'navTitle'      => $portfolioSection->value,
            'sectionTitle'  => 'Portfolio',
            'itemLimit'     => $portfolioSectionLimit,
            'noItems'       => trans('portfolio.sections.portfolio.noItems'),
            'items'         => array_slice($items, 0, $portfolioSectionLimit),
            'seeMoreButton' => [
                'enabled'   => $more,
                'link'      => route('portfolio'),
                'text'      => 'See more',
                'icon'      => 'fa-long-arrow-right',
            ],
        ];
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection The Portfolio section Enabled and Nav Title.
     */
    public static function getPortfolioSection()
    {
        $key = 'cms_portfolio_section';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::PortfolioSection()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection The Portfolio section Enabled and Nav Title.
     */
    public static function getPortfolioSectionLimit()
    {
        $key = 'cms_portfolio_section_limit';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::PortfolioSectionLimit()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection The Portfolio section Enabled and Nav Title.
     */
    public static function getPortfolioSectionLightboxEnabled()
    {
        $key = 'cms_portfolio_section_lightbox_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::PortfolioSectionLightboxEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the portfolio items.
     *
     * @return array The portfolio items.
     */
    public function getPortfolioItems()
    {
        $portfolioItemsRequest  = Request::create('/api/portfolioitems/all/', 'GET');
        $portfolioItems         = json_decode(Route::dispatch($portfolioItemsRequest)->getContent());

        return $portfolioItems;
    }
}

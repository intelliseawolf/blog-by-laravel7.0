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
        $portfolioSection       = self::getPortfolioSection();
        $portfolioSectionLimit  = self::getPortfolioSectionLimit()->value;
        $seeMoreButton          = self::getPortfolioSectionSeeMoreButton();
        $items                  = self::getPortfolioItems();
        $sectionTitleData       = self::getPortfolioSectionTitle();
        $sectionTitle           = '';

        if ($sectionTitleData->active) {
            $sectionTitle = $sectionTitleData->value;
        }

        if (!$portfolioSectionLimit) {
            $portfolioSectionLimit = count($items);
        }

        return [
            'enabled'       => $portfolioSection->active,
            'spacing'       => self::getPortfolioSectionSpacingEnabled()->active,
            'lightBox'      => self::getPortfolioSectionLightboxEnabled()->active,
            'navTitle'      => $portfolioSection->value,
            'sectionTitle'  => $sectionTitle,
            'itemLimit'     => $portfolioSectionLimit,
            'noItems'       => trans('portfolio.sections.portfolio.noItems'),
            'items'         => array_slice($items, 0, $portfolioSectionLimit),
            'seeMoreButton' => [
                'enabled'   =>  $seeMoreButton->active,
                'link'      => route('portfolio'),
                'text'      =>  $seeMoreButton->value,
                'icon'      => 'fa-long-arrow-right',
            ],
        ];
    }

    /**
     * Gets the section Enabled and Nav title from the CMS Settings table.
     *
     * @return collection.
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
     * Gets the section post limit the CMS Settings table.
     *
     * @return collection.
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
     * Gets the section Enabled Lightbox from the CMS Settings table.
     *
     * @return collection.
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
     * Gets the section Enabled Spacing from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getPortfolioSectionSpacingEnabled()
    {
        $key = 'cms_portfolio_section_spacing_enabled';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::PortfolioSectionSpacingEnabled()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section Title from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getPortfolioSectionTitle()
    {
        $key = 'cms_portfolio_section_title';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::PortfolioSectionTitle()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the section show more button from the CMS Settings table.
     *
     * @return collection.
     */
    public static function getPortfolioSectionSeeMoreButton()
    {
        $key = 'cms_portfolio_section_see_more_button';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $item = CmsSetting::PortfolioSectionSeeMoreButton()->first();
        self::storeInCache($key, $item);

        return $item;
    }

    /**
     * Gets the portfolio items.
     *
     * @return array The portfolio items.
     */
    public static function getPortfolioItems()
    {
        $key = 'portfolio_section_items';

        if (self::checkIfItemIsCached($key)) {
            return self::getFromCache($key);
        }

        $items = self::getPortfolioItemsFromAPI();
        self::storeInCache($key, $items);

        return $items;
    }

    /**
     * Gets the portfolio items.
     *
     * @return array The portfolio items from the API.
     */
    public static function getPortfolioItemsFromAPI()
    {
        $portfolioItemsRequest  = Request::create('/api/portfolioitems/all/', 'GET');
        $portfolioItems         = json_decode(Route::dispatch($portfolioItemsRequest)->getContent());

        return $portfolioItems;
    }

}

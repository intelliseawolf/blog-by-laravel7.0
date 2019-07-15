<?php

namespace App\Services\Sections;

use Illuminate\Http\Request;
use Route;

class PortfolioSectionService
{
    /**
     * Gets the portfolio data.
     *
     * @param      boolean  $enabled   The enabled
     * @param      integer  $limit     The limit
     * @param      boolean  $lightbox  The lightbox
     * @param      boolean  $spacing   The spacing
     * @param      boolean  $more      The more
     *
     * @return     array    The portfolio data.
     */
    public function getSectionData($enabled = true, $limit = 8, $lightbox = false, $spacing=false, $more=true)
    {
        $items = $this->getPortfolioItems();
        if (!$limit) {
            $limit = count($items);
        }

        return [
            'enabled'       => $enabled,
            'spacing'       => $spacing,
            'lightBox'      => $lightbox,
            'navTitle'      => 'Portfolio',
            'sectionTitle'  => 'Portfolio',
            'itemLimit'     => $limit,
            'noItems'       => trans('portfolio.sections.portfolio.noItems'),
            'items'         => array_slice($items, 0, $limit),
            'seeMoreButton' => [
                'enabled'   => $more,
                'link'      => route('portfolio'),
                'text'      => 'See more',
                'icon'      => 'fa-long-arrow-right',
            ],
        ];
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

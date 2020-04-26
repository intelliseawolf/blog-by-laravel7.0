<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\PortfolioItemTag;
use App\Traits\DynamicDataTrait;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    use DynamicDataTrait;

    /**
     * Display a listing of the enabled portfolio items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'logoText' => $this->getLogoText(),
            'navTitle' => trans('portfolio.sections.portfolio.navTitle'),
            'sections' => [
                'preloader'         => $this->getPreloaderData(),
                'portfolio'         => $this->getPortfolioData(true),
                'footer'            => $this->getFooterData(),
            ],
        ];

        return view('portfolio.portfolio-list', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param string  $slug
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showPortfolioItem(Request $request, $slug)
    {
        $user = \Auth::user();

        // Allow writers to view all portfolio items and everyone else only enabled items
        if ($user && $user->level() > 2) {
            $portfolioItem = PortfolioItem::with('tags')
                            ->with('techTags')
                            ->bySlug($slug)
                            ->firstOrFail();
        } else {
            $portfolioItem = PortfolioItem::with('tags')
                            ->with('techTags')
                            ->bySlug($slug)
                            ->isEnabled()
                            ->firstOrFail();
        }

        $tag = $request->get('tag');

        if ($tag) {
            $tag = PortfolioItemTag::whereTag($tag)->firstOrFail();
        }

        $data = [
            'logoText' => $this->getLogoText(),
            'navTitle' => trans('portfolio.sections.portfolio-item.navTitle', ['name' => $portfolioItem->title]),
            'tag'      => $tag,
            'slug'     => $slug,
            'sections' => [
                'preloader'         => $this->getPreloaderData(),
                'portfolioItem'     => $portfolioItem,
                'footer'            => $this->getFooterData(),
            ],
        ];

        return view('portfolio.portfolio-item', $data);
    }
}

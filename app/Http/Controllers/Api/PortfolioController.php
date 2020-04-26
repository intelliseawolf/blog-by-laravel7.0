<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display all the posts.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function allPortfolioItems(Request $request)
    {
        $enablePortfolioItems = PortfolioItem::allPublishedPortfolioItems()->get();

        return response()->json($enablePortfolioItems, Response::HTTP_OK);
    }
}

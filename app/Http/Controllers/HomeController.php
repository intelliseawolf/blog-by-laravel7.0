<?php

namespace App\Http\Controllers;

use App\Traits\DynamicDataTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use DynamicDataTrait;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'logoText'      => $this->getLogoText(),
            'sections'      => $this->sectionData(),
        ];

        return view('portfolio.home')->with($data);
    }
}

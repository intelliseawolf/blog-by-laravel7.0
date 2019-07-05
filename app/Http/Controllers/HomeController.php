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
        // $this->middleware('auth');
    }

    /**
     * Get the Sections Data
     *
     * @return array
     */
    private function sectionData()
    {
        return [
            'preloader'             => $this->getPreloaderData(),
            'intro'                 => $this->getIntroData(),
            'about'                 => $this->getAboutData(),
            'skills'                => $this->getSkillsData(),
            'services'              => $this->getServicesData(),
            'counters'              => $this->getCountersData(),
            'portfolio'             => $this->getPortfolioData(true, 8),
            'experienceTimeline'    => $this->getExperienceTimelineData(),
            'blog'                  => $this->getBlogData(),
            'testimonials'          => $this->getTestimonialsData(),
            'contact'               => $this->getContactData(),
            'footer'                => $this->getFooterData(),
        ];
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

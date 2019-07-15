<?php

namespace App\Traits;

use App\Services\Sections\AboutSectionService;
use App\Services\Sections\BlogSectionService;
use App\Services\Sections\ContactSectionService;
use App\Services\Sections\CountersSectionService;
use App\Services\Sections\EducationTimelineSectionService;
use App\Services\Sections\ExperienceTimelineSectionService;
use App\Services\Sections\FooterSectionService;
use App\Services\Sections\IntroSectionService;
use App\Services\Sections\LogoService;
use App\Services\Sections\PortfolioSectionService;
use App\Services\Sections\PreloaderService;
use App\Services\Sections\ServicesSectionService;
use App\Services\Sections\SkillsSectionService;
use App\Services\Sections\TestimonialsSectionService;

trait DynamicDataTrait
{
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
            'portfolio'             => $this->getPortfolioData(),
            'experienceTimeline'    => $this->getExperienceTimelineData(),
            'educationTimeline'     => $this->getEducationTimelineData(),
            'blog'                  => $this->getBlogData(),
            'testimonials'          => $this->getTestimonialsData(),
            'contact'               => $this->getContactData(),
            'footer'                => $this->getFooterData(),
        ];
    }

    /**
     * Gets the about data.
     *
     * @return array The about data.
     */
    public function getAboutData()
    {
        $service = new AboutSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the blog data.
     *
     * @return array  The blog data.
     */
    public function getBlogData()
    {
        $service = new BlogSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the contact data.
     *
     * @return array The contact data.
     */
    public function getContactData()
    {
        $service = new ContactSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the counters data.
     *
     * @return array The counters data.
     */
    public function getCountersData()
    {
        $service = new CountersSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the education timeline data.
     */
    public function getEducationTimelineData()
    {
        $service = new EducationTimelineSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the experience timeline data.
     */
    public function getExperienceTimelineData()
    {
        $service = new ExperienceTimelineSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the footer data.
     *
     * @return array  The footer data.
     */
    public function getFooterData()
    {
        $service = new FooterSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the intro data.
     *
     * @return     array  The intro data.
     */
    public function getIntroData()
    {
        $service = new IntroSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the logo text.
     *
     * @return string The logo text.
     */
    public function getLogoText()
    {
        $service = new LogoService;
        return $service->getSectionData();
    }

    /**
     * Gets the portfolio data.
     *
     * @return     array    The portfolio data.
     */
    public function getPortfolioData()
    {
        $service = new PortfolioSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the preloader data.
     *
     * @return array The preloader data.
     */
    public function getPreloaderData()
    {
        $service = new PreloaderService;
        return $service->getSectionData();
    }

    /**
     * Gets the services data.
     *
     * @return array The services data.
     */
    public function getServicesData()
    {
        $service = new ServicesSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the skills data.
     *
     * @return array The skills data.
     */
    public function getSkillsData()
    {
        $service = new SkillsSectionService;
        return $service->getSectionData();
    }

    /**
     * Gets the testimonials data.
     *
     * @return array The testimonials data.
     */
    public function getTestimonialsData()
    {
        $service = new TestimonialsSectionService;
        return $service->getSectionData();
    }
}

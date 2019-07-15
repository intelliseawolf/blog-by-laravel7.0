<?php

namespace App\Services\Sections;

class AboutSectionService
{
    /**
     * Gets the about data.
     *
     * @return array The about data.
     */
    public function getSectionData()
    {
        return [
            'enabled'       => true,
            'titleEnabled'  => true,
            'aboutButtons'  => true,
            'navTitle'      => 'About Me',
            'intro'         => trans('portfolio.sections.about.intro'),
            'textTitle'     => trans('portfolio.sections.about.textTitle'),
            'text'          => trans('portfolio.sections.about.text'),
            'buttons'       => collect([
                [
                    'enabled'   => false,
                    'link'      => '#',
                    'text'      => 'Hire me',
                    'delay'     => '150',
                    'target'    => '_blank',
                ],
                [
                    'enabled'   => false,
                    'link'      => '#',
                    'text'      => 'Download CV',
                    'delay'     => '300',
                    'target'    => '_blank',
                ],
            ]),
        ];
    }

}

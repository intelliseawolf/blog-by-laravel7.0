<?php

namespace App\Services\Sections;

class ServicesSectionService
{
    /**
     * Gets the services data.
     *
     * @return array The services data.
     */
    public function getSectionData()
    {
        return [
            'enabled'               => true,
            'navTitle'              => 'Services',
            'sectionTitleEnabled'   => true,
            'sectionTitle'          => 'My Offer',
            'bsClass'               => "col-sm-6 col-md-3",
            'items' => collect([
                [
                    'name'  => 'Photography',
                    'icon'  => 'icon-camera',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, hic.</p>',
                    'delay' => '0',
                ],
                [
                    'name'  => 'Web design',
                    'icon'  => 'icon-tools',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, placeat!</p>',
                    'delay' => '150',
                ],
                [
                    'name'  => 'Web Development',
                    'icon'  => 'icon-laptop',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, mollitia.</p>',
                    'delay' => '300',
                ],
                [
                    'name'  => 'Mobile apps',
                    'icon'  => 'icon-mobile',
                    'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, veritatis?</p>',
                    'delay' => '450',
                ],
            ]),
        ];
    }
}

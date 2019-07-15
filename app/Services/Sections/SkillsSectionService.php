<?php

namespace App\Services\Sections;

class SkillsSectionService
{
    /**
     * Gets the skills data.
     *
     * @return array The skills data.
     */
    public function getSectionData()
    {
        return [
            'enabled'       => true,
            'titleEnabled'  => true,
            'title'         => 'My Skills',
            'items' => collect([
                [
                    'name'      => 'PHP <span class="c-silver"> - 9 years of experience</span>',
                    'percent'   => '100',
                ],
                [
                    'name'      => 'Laravel <span class="c-silver"> - 8 years of experience</span>',
                    'percent'   => '100',
                ],
                [
                    'name'      => 'HTML <span class="c-silver"> - 10 years of experience</span>',
                    'percent'   => '100',
                ],
                [
                    'name'      => 'CSS/SCSS/SASS/LESS <span class="c-silver"> - 10 years of experience</span>',
                    'percent'   => '100',
                ],
            ]),
        ];
    }
}

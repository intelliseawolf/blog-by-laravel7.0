<?php

namespace App\Services\Sections;

use App\Models\TimelineItem;

class ExperienceTimelineSectionService
{
    /**
     * Gets the experience timeline data.
     */
    public function getSectionData($enabled = true)
    {
        $items = TimelineItem::allEnabledItemsByType('experience')->get();

        return [
            'enabled'       => $enabled,
            'sectionTitle'  => 'My Experience',
            'sectionClass'  => '',
            'items'         => $items,
        ];
    }
}

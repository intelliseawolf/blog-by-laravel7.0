<?php

namespace App\Services\Sections;

use App\Models\TimelineItem;

class EducationTimelineSectionService
{
    /**
     * Gets the education timeline data.
     */
    public function getSectionData($enabled = true)
    {
        $items = TimelineItem::allEnabledItemsByType('education')->get();

        return [
            'enabled'       => $enabled,
            'sectionTitle'  => 'My Education',
            'sectionClass'  => 'section--darker',
            'items'         => $items,
        ];
    }
}

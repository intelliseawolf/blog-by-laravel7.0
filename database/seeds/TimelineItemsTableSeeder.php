<?php

use App\Models\TimelineItem;
use App\Models\TimelineType;
use Illuminate\Database\Seeder;

class TimelineItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the table
        TimelineItem::truncate();

        // Seed Fake Items
        // factory(TimelineItem::class, 20)->create();


        // Seed Real Items
        $timelineTypes      = TimelineType::all();
        $experienceId       = null;
        $educationId        = null;

        // Get ID's for timeline item types
        foreach ($timelineTypes as $timelineType) {
            if ($timelineType->slug === 'experience') {
                $experienceId = $timelineType->id;
            }
            if ($timelineType->slug === 'education') {
                $educationId = $timelineType->id;
            }
        }

        // Array of Experience Items
        $experienceItems = [
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-globe',
                'dates'         => '2019 - Present',
                'title'         => 'FocusVision Worldwide',
                'subtitle'      => 'Software Engineering Manager',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-area-chart',
                'dates'         => '2017 - 2019',
                'title'         => 'Sq1 (Owned by Ansira)',
                'subtitle'      => 'Engineering Director & Lead Architect',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2016 - 2017',
                'title'         => 'Rubicon International',
                'subtitle'      => 'Senior Software Engineer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-building',
                'dates'         => '2016 - 2017',
                'title'         => 'GTS Services',
                'subtitle'      => 'Senior Web Developer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-code',
                'dates'         => '2015 - 2016',
                'title'         => 'Vernier Software & Technology',
                'subtitle'      => 'Senior Front End Web Developer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-building-o',
                'dates'         => '2015 - 2016',
                'title'         => 'Graybox',
                'subtitle'      => 'Web Developer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-newspaper-o',
                'dates'         => '2014',
                'title'         => 'Turtledove Clemens Inc.',
                'subtitle'      => 'Digital Services Manager, Developer & Designer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-shopping-cart',
                'dates'         => '2013 - 2014',
                'title'         => 'ParaCore',
                'subtitle'      => 'Web Developer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-handshake-o',
                'dates'         => '2012 - 2016',
                'title'         => 'Jeremy Edgar Kenedy Consulting, LLC',
                'subtitle'      => 'Web Developer, Designer & Owner',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-line-chart',
                'dates'         => '2014',
                'title'         => 'ParaCore',
                'subtitle'      => 'Web Developer',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-h-square',
                'dates'         => '2012 - 2013',
                'title'         => 'Choice Hotels International',
                'subtitle'      => 'Enterprise Data Center Contractor',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-balance-scale',
                'dates'         => '2006 - 2012',
                'title'         => 'Paralegal',
                'subtitle'      => 'Criminal, Tax, Juvenile & Personal Injury Law',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $experienceId,
                'sort_order'    => null,
                'icon'          => 'fa-gavel',
                'dates'         => '2004 - 2006',
                'title'         => 'Maricopa County Superior Court',
                'subtitle'      => 'Judicial Associate',
                'text'          => null,
            ],
        ];

        // Array of Education Items
        $educationItems = [
            [
                'enabled'       => 1,
                'type_id'       => $educationId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2014',
                'title'         => 'Web Design',
                'subtitle'      => 'Paradise Valley Community College',
                'text'          => 'Certificate in Web Design, Web Page, Digital/Multimedia and Information Resources Design',
            ],
            [
                'enabled'       => 1,
                'type_id'       => $educationId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2013',
                'title'         => 'Programming & Systems Analysis',
                'subtitle'      => 'Paradise Valley Community College',
                'text'          => 'Programming and Systems Analysis Certificate is focused on OOP and problem solving.',
            ],
            [
                'enabled'       => 1,
                'type_id'       => $educationId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2012',
                'title'         => 'Computer Information Systems',
                'subtitle'      => 'Paradise Valley Community College',
                'text'          => 'Certificate in Computer Information Systems',
            ],
            [
                'enabled'       => 1,
                'type_id'       => $educationId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2012',
                'title'         => 'Associate of Arts',
                'subtitle'      => 'Paradise Valley Community College',
                'text'          => null,
            ],
            [
                'enabled'       => 1,
                'type_id'       => $educationId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2007',
                'title'         => 'Bachelor of Science',
                'subtitle'      => 'Arizona State University',
                'text'          => 'Bachelor of Science (B.S.), Criminal Justice and Criminology',
            ],
            [
                'enabled'       => 1,
                'type_id'       => $educationId,
                'sort_order'    => null,
                'icon'          => 'fa-graduation-cap',
                'dates'         => '2004',
                'title'         => 'Associate in Education',
                'subtitle'      => 'Phoenix Community College',
                'text'          => null,
            ],
        ];

        // Set initial index numbers
        $experienceIndexNo = count($experienceItems);
        $educationIndexNo = count($educationItems);

        // Loop through and add experience items
        foreach ($experienceItems as $experienceItem) {
            $newTimelineItem = TimelineItem::create([
                'enabled'       => $experienceItem['enabled'],
                'type_id'       => $experienceItem['type_id'],
                'sort_order'    => $experienceIndexNo,
                'icon'          => $experienceItem['icon'],
                'dates'         => $experienceItem['dates'],
                'title'         => $experienceItem['title'],
                'subtitle'      => $experienceItem['subtitle'],
                'text'          => $experienceItem['text'],
            ]);
            $experienceIndexNo--;
        }

        // Loop through and add education items
        foreach ($educationItems as $educationItem) {
            $newTimelineItem = TimelineItem::create([
                'enabled'       => $educationItem['enabled'],
                'type_id'       => $educationItem['type_id'],
                'sort_order'    => $educationIndexNo,
                'icon'          => $educationItem['icon'],
                'dates'         => $educationItem['dates'],
                'title'         => $educationItem['title'],
                'subtitle'      => $educationItem['subtitle'],
                'text'          => $educationItem['text'],
            ]);
            $educationIndexNo--;
        }
    }
}

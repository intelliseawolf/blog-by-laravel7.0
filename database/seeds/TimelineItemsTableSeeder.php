<?php

use App\Models\TimelineItem;
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
        // Clear the items table
        TimelineItem::truncate();

        // Seed Fake Items
        factory(TimelineItem::class, 20)->create()->each(function ($portfolioItem) {
            //
        });

    }
}

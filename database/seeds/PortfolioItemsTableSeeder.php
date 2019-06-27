<?php

use App\Models\PortfolioItem;
use App\Models\PortfolioItemTag;
use App\Models\PortfolioItemTechTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $portfolioTags = PortfolioItemTag::pluck('tag')->all();
        $portfolioTechTags = PortfolioItemTechTag::pluck('tag')->all();

        // Clear the Portfolio items table
        PortfolioItem::truncate();

        // Clear the portfio items tag pivot table
        DB::table('portfolio_item_tag_pivot')->truncate();

        // Clear the portfio items tech tag pivot table
        DB::table('portfolio_item_tech_tag_pivot')->truncate();

        factory(PortfolioItem::class, 100)->create()->each(function ($portfolioItem) use ($portfolioTags, $portfolioTechTags) {

            shuffle($portfolioTags);
            $portfolioItemTags = [$portfolioTags[0]];

            shuffle($portfolioTechTags);
            $portfolioItemTechTags = [$portfolioTechTags[0]];

            // 40% of the time we're assigning portfolioTags, assign 2
            if (mt_rand(1, 100) <= 40) {
                $portfolioItemTags[] = $portfolioTags[1];
            }

            // 90% of the time we're assigning portfolioTags, assign 4
            if (mt_rand(1, 100) <= 90) {
                $portfolioItemTechTags[] = $portfolioTechTags[0];
                $portfolioItemTechTags[] = $portfolioTechTags[1];
                $portfolioItemTechTags[] = $portfolioTechTags[2];
                $portfolioItemTechTags[] = $portfolioTechTags[3];
            }

            $portfolioItem->syncTags($portfolioItemTags);
            $portfolioItem->syncTechTags($portfolioItemTechTags);
        });
    }
}

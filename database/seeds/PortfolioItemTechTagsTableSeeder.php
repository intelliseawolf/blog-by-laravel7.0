<?php

use App\Models\PortfolioItemTechTag;
use Illuminate\Database\Seeder;

class PortfolioItemTechTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortfolioItemTechTag::truncate();

        factory(PortfolioItemTechTag::class, 10)->create();
    }
}

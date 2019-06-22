<?php

use App\Models\PortfolioItemTag;
use Illuminate\Database\Seeder;

class PortfolioItemTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortfolioItemTag::truncate();

        factory(PortfolioItemTag::class, 10)->create();
    }
}

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
        $seedFakeTags = false;
        $seedRealTags = true;

        // Clear the tags table.
        PortfolioItemTag::truncate();

        if ($seedFakeTags) {
            factory(PortfolioItemTag::class, 10)->create();
        }

        if ($seedRealTags) {
            $items = [
                [
                    'tag'   => 'back_end_development',
                    'title' => 'Back End Development'
                ],
                [
                    'tag'   => 'front_end_development',
                    'title' => 'Front End Development'
                ],
                [
                    'tag'   => 'development',
                    'title' => 'Development'
                ],
                [
                    'tag'   => 'design',
                    'title' => 'Design'
                ],
                [
                    'tag'   => 'composer_package',
                    'title' => 'Composer Package'
                ],
                [
                    'tag'   => 'npm_package',
                    'title' => 'NPM Package'
                ],
                [
                    'tag'   => 'package',
                    'title' => 'Package'
                ],
            ];

            foreach ($items as $item) {
                $newPortfolioItemTag = PortfolioItemTag::where('tag', '=', $item['tag'])->first();

                if ($newPortfolioItemTag === null) {
                    $newPortfolioItemTag = PortfolioItemTag::create([
                        'tag'   => $item['tag'],
                        'title' => $item['title'],
                    ]);
                }
            }
        }
    }
}

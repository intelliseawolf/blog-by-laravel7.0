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
        $seedFakeTags = false;
        $seedRealTags = true;

        // Clear the tags table.
        PortfolioItemTechTag::truncate();

        if ($seedFakeTags) {
            factory(PortfolioItemTechTag::class, 10)->create();
        }

        if ($seedRealTags) {
            $items = [
                [
                    'tag'   => 'laravel',
                    'title' => 'Laravel',
                ],
                [
                    'tag'   => 'php',
                    'title' => 'PHP',
                ],
                [
                    'tag'   => 'javascript',
                    'title' => 'JavaScript',
                ],
                [
                    'tag'   => 'vue_js',
                    'title' => 'Vue JS',
                ],
                [
                    'tag'   => 'html_5',
                    'title' => 'Html 5',
                ],
                [
                    'tag'   => 'sass_scss',
                    'title' => 'Sass/Scss',
                ],
                [
                    'tag'   => 'bootstrap',
                    'title' => 'Bootstrap',
                ],
                [
                    'tag'   => 'foundation',
                    'title' => 'Foundation',
                ],
                [
                    'tag'   => 'wordpress',
                    'title' => 'WordPress',
                ],
                [
                    'tag'   => 'facebook_sdk',
                    'title' => 'Facebook SDK/API',
                ],
                [
                    'tag'   => 'mindbody_api',
                    'title' => 'MindBody API',
                ],
                [
                    'tag'   => 'google_api',
                    'title' => 'Google API',
                ],
            ];

            foreach ($items as $item) {
                $newPortfolioItemTechTag = PortfolioItemTechTag::where('tag', '=', $item['tag'])->first();

                if ($newPortfolioItemTechTag === null) {
                    $newPortfolioItemTechTag = PortfolioItemTechTag::create([
                        'tag'   => $item['tag'],
                        'title' => $item['title'],
                    ]);
                }
            }
        }
    }
}

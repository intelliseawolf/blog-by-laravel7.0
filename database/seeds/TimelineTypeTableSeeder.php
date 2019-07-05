<?php

use App\Models\TimelineType;
use Illuminate\Database\Seeder;

class TimelineTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name'  => 'Experience',
                'slug'  => 'experience',
            ],
            [
                'name'  => 'Education',
                'slug'  => 'education',
            ],
        ];

        foreach ($types as $type) {
            $newType = TimelineType::where('slug', '=', $type['slug'])->first();

            if ($newType === null) {
                $newType = TimelineType::create([
                    'name'  => $type['name'],
                    'slug'  => $type['slug'],
                ]);
            }
        }
    }
}

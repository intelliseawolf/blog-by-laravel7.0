<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = [
            [
                'name' => 'Default',
                'link' => 'null',
            ],
            [
                'name' => 'BS-4 - Darkly',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/darkly/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Cyborg',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/cyborg/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Cosmo',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/cosmo/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Cerulean',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/cerulean/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Flatly',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/flatly/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Journal',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/journal/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Lumen',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/lumen/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Paper',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/paper/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Readable',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/readable/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Sandstone',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/sandstone/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Simplex',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/simplex/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Slate',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/slate/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Spacelab',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/spacelab/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Superhero',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/superhero/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - United',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/united/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Yeti',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/yeti/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Bootstrap 4.0.0 Alpha',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Materialize',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css',
            ],
            [
                'name' => 'BS-4 - Bootstrap Material Design 4.0.0',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/4.0.0/bootstrap-material-design.min.css',
            ],
            [
                'name' => 'BS-4 - Bootstrap Material Design 4.0.2',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/4.0.2/bootstrap-material-design.min.css',
            ],
            [
                'name' => 'BS-4 - mdbootstrap',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/css/mdb.min.css',
            ],
            [
                'name' => 'BS-4 - Litera',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/litera/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Lux',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/lux/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Materia',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/materia/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Minty',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/minty/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Pulse',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/pulse/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Sketchy',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/sketchy/bootstrap.min.css',
            ],
            [
                'name' => 'BS-4 - Solar',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/solar/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Darkly',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Cyborg',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cyborg/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Cosmo',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Cerulean',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Flatly',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Journal',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Lumen',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Paper',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Readable',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Sandstone',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Simplex',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/simplex/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Slate',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Spacelab',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Superhero',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - United',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Yeti',
                'link' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css',
            ],
            [
                'name' => 'BS-3 - Materialize',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css',
            ],
            [
                'name' => 'BS-3 - Bootstrap Material Design 0.3.0',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css',
            ],
            [
                'name' => 'BS-3 - Bootstrap Material Design 0.5.10',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css',
            ],
            [
                'name' => 'BS-3 - bootflat',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.min.css',
            ],
            [
                'name' => 'BS-3 - flat-ui',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css',
            ],
            [
                'name' => 'BS-3 - m8tro-bootstrap',
                'link' => 'https://cdnjs.cloudflare.com/ajax/libs/m8tro-bootstrap/3.3.7/m8tro.min.css',
            ],
        ];

        foreach ($themes as $theme) {
            $newTheme = Theme::where('name', '=', $theme['name'])->first();
            if ($newTheme === null) {
                $newTheme = Theme::create([
                    'name'          => $theme['name'],
                    'link'          => $theme['link'],
                    'taggable_id'   => 0,
                    'taggable_type' => 'theme',
                ]);
            }
        }

        $allThemes = Theme::All();
        foreach ($allThemes as $theme) {
            $theme->taggable_id = $theme->id;
            $theme->save();
        }
    }
}

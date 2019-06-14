<?php

namespace App\Providers;

use KgBot\LaravelLocalization\Facades\ExportLocalizations as ExportLocalization;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ExportLocalizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            return $view->with( [
                'messages' => ExportLocalization::export()->toFlat(),
            ]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

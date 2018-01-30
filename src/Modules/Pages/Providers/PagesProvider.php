<?php

namespace Grundmanis\Laracms\Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;

class PagesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.pages');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_pages_routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}

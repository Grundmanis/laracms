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
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        $this->publishes([
            __DIR__.'/../views/pages/' => resource_path('views/laracms/pages'),
        ], 'laracms_pages');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

}

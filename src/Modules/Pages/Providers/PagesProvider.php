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
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_pages_routes.php');

        $this->publishes([
            __DIR__.'/../views/pages/layouts/' => resource_path('views/laracms/pages/layouts'),
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

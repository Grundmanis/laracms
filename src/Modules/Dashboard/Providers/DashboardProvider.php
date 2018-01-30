<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.dashboard');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_dashboard_routes.php');
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

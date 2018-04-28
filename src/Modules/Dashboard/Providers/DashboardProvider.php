<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Providers;

use Grundmanis\Laracms\Modules\Dashboard\Commands\LaracmsConfigure;
use Grundmanis\Laracms\Modules\Dashboard\Facades\LocaleFacade;
use Grundmanis\Laracms\Modules\Dashboard\LocalesGenerator;
use Grundmanis\Laracms\Modules\Dashboard\ViewComposers\LocalesComposer;
use Illuminate\Foundation\AliasLoader;
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                LaracmsConfigure::class,
            ]);
        }
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.dashboard');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_dashboard_routes.php');
        view()->composer('*',LocalesComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Locale', LocalesGenerator::class);

        $loader = AliasLoader::getInstance();
        $loader->alias('LocaleAlias', LocaleFacade::class);
    }

}

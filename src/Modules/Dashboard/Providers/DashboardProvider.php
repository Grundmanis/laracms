<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Providers;

use Grundmanis\Laracms\Modules\Dashboard\Commands\LaracmsConfigure;
use Grundmanis\Laracms\Modules\Dashboard\Facades\LocaleFacade;
use Grundmanis\Laracms\Modules\Dashboard\LocalesGenerator;
use Grundmanis\Laracms\Modules\Dashboard\Middleware\LaracmsLanguage;
use Grundmanis\Laracms\Modules\Dashboard\ViewComposers\LocalesComposer;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        require(__DIR__.'/../../../functions.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                LaracmsConfigure::class,
            ]);
        }
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.dashboard');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_dashboard_routes.php');
        $this->loadTranslationsFrom(__DIR__.'/../translations', 'laracms');

        $router->aliasMiddleware('laracms.language', LaracmsLanguage::class);

        $this->publishes([
            __DIR__.'/../views/' => resource_path('views/laracms/dashboard'),
        ], 'laracms');

        $this->publishes([
            __DIR__.'/../assets/' => public_path('laracms_assets/'),
        ], 'laracms');

        $this->publishes([
            __DIR__.'/../translations' => resource_path('lang/vendor/laracms'),
        ], 'laracms');

        $this->publishes([
            __DIR__.'/../laracms.php' => config_path('laracms.php'),
        ], 'laracms');

        view()->composer('*', LocalesComposer::class);
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

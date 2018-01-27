<?php

namespace Grundweb\Laracms;

use Grundweb\Laracms\Modules\Breadcrumbs\ViewComposers\BreadcrumbsComposer;
use Grundweb\Laracms\Modules\User\Middleware\LaracmsRedirectIfAuthenticated;
use Grundweb\Laracms\Modules\User\Middleware\LaracmsRedirectIfNotAuthenticated;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaracmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->registerHelpers();

        $router->aliasMiddleware('laracms.auth', LaracmsRedirectIfNotAuthenticated::class);
        $router->aliasMiddleware('laracms.guest', LaracmsRedirectIfAuthenticated::class);

        $this->loadViewsFrom(__DIR__.'/layouts', 'laracms');
        $this->loadViewsFrom(__DIR__.'/Modules/User/views', 'laracms.user');
        $this->loadViewsFrom(__DIR__.'/Modules/Dashboard/views', 'laracms.dashboard');
        $this->loadViewsFrom(__DIR__.'/Modules/Content/views', 'laracms.content');
        $this->loadViewsFrom(__DIR__.'/Modules/Breadcrumbs/views', 'laracms.breadcrumbs');

        $this->loadMigrationsFrom(__DIR__.'/Modules/User/migrations');
        $this->loadMigrationsFrom(__DIR__.'/Modules/Content/migrations');

        view()->composer('laracms.breadcrumbs::links',BreadcrumbsComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/Modules/Dashboard/laracms_routes.php';
        include __DIR__.'/Modules/User/laracms_user_routes.php';
        include __DIR__.'/Modules/Content/laracms_content_routes.php';
    }

    /**
     * Register helpers
     */
    public function registerHelpers()
    {
        // Load the helpers in app/Http/helpers.php
        if (file_exists($file = __DIR__.'/laracms_helpers.php'))
        {
            require $file;
        }
    }
}

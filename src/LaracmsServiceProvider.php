<?php

namespace Grundweb\Laracms;

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
        $router->aliasMiddleware('laracms.auth', LaracmsRedirectIfNotAuthenticated::class);
        $router->aliasMiddleware('laracms.guest', LaracmsRedirectIfAuthenticated::class);

        $this->loadViewsFrom(__DIR__.'/layouts', 'laracms');

        $this->loadViewsFrom(__DIR__.'/Modules/User/views', 'laracms.user');
        $this->loadViewsFrom(__DIR__.'/Modules/Dashboard/views', 'laracms');
        $this->loadViewsFrom(__DIR__.'/Modules/Content/views', 'laracms.content');
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
}

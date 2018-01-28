<?php

namespace Grundmanis\Laracms\Modules\Breadcrumbs\Providers;

use Grundmanis\Laracms\Modules\Breadcrumbs\ViewComposers\BreadcrumbsComposer;
use Illuminate\Support\ServiceProvider;

class BreadcrumbsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Breadcrumbs module
        view()->composer('laracms.breadcrumbs::links',BreadcrumbsComposer::class);
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

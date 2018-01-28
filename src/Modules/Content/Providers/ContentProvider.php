<?php

namespace Grundweb\Laracms\Modules\Content\Providers;

use Grundweb\Laracms\Modules\Breadcrumbs\ViewComposers\BreadcrumbsComposer;
use Grundweb\Laracms\Modules\Content\Content;
use Illuminate\Support\ServiceProvider;

class ContentProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Content module
        $this->app->bind('Content', Content::class);
    }

}

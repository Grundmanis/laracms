<?php

namespace Grundmanis\Laracms;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class LaracmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require(__DIR__.'/functions.php');

        $this->registerModules();

        $this->publishes([
            __DIR__ . '/config/laracms.php' => config_path('laracms.php'),
        ], 'laracms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/laracms.php', 'laracms'
        );
    }

    /**
     * Load view, migration, routes
     */
    private function registerModules()
    {
        foreach (array_diff(scandir(__DIR__.'/Modules/'), ['.', '..']) as $moduleName) {
            $moduleFolder = __DIR__ . '/Modules/' . $moduleName;
            $this->registerModuleProvider($moduleFolder, $moduleName);
        }
    }

    /**
     * @param $moduleFolder
     * @param $moduleName
     */
    private function registerModuleProvider($moduleFolder, $moduleName)
    {
        if (File::exists($folder = $moduleFolder . '/Providers'))
        {
            $namespace = __NAMESPACE__ . '\Modules\\' . $moduleName . '\\Providers\\';
            foreach (array_diff(scandir($folder), ['.', '..']) as $provider) {
                $provider = str_replace('.php', '', $provider);
                $this->app->register($namespace . $provider);
            }
        }
    }

}

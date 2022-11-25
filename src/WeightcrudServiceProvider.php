<?php

namespace Pringal\Weightcrud;

use Illuminate\Support\ServiceProvider;

class WeightcrudServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pringal');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'pringal');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        
        \Artisan::call('migrate --path=packages/pringal/weightcrud/database/migrations/2018_08_08_100000_create_weight_table.php');
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'weightcrud');
            
          $this->app['router']->namespace('Pringal\\Weightcrud\\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
                });
        

        // Publishing is only necessary when using the CLI.
        // if ($this->app->runningInConsole()) {
        //     $this->bootForConsole();
        // }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/weightcrud.php', 'weightcrud');

        // Register the service the package provides.
        $this->app->singleton('weightcrud', function ($app) {
            return new Weightcrud;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['weightcrud'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/weightcrud.php' => config_path('weightcrud.php'),
        ], 'weightcrud.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/pringal'),
        ], 'weightcrud.resources.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/pringal'),
        ], 'weightcrud.resources.views');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/pringal'),
        ], 'weightcrud.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

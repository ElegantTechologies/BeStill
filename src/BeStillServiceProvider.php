<?php

namespace ElegantTechnologies\BeStill;

use Illuminate\Support\ServiceProvider;

class BeStillServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'eleganttechnologies');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'eleganttechnologies');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bestill.php', 'bestill');

        // Register the service the package provides.
        $this->app->singleton('bestill', function ($app) {
            return new BeStill;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bestill'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/bestill.php' => config_path('bestill.php'),
        ], 'bestill.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/eleganttechnologies'),
        ], 'bestill.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/eleganttechnologies'),
        ], 'bestill.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/eleganttechnologies'),
        ], 'bestill.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

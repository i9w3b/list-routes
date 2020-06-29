<?php

namespace I9w3b\ListRoutes;

use Illuminate\Support\ServiceProvider;

class ListRoutesServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootConfig();
        $this->registerViews();
        $this->registerTranslations();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Boot config.
     *
     * @return void
     */
    public function bootConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('listroutes.php'),
        ], 'config');
    }

    /**
     * Register config.
     *
     * @return void
     */
    private function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php',
            'listroutes'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/listroutes');
        $sourcePath = __DIR__ . '/Resources/views';
        $this->publishes([
            $sourcePath => $viewPath
        ],'listroutes-views');
        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/listroutes';
        }, \Config::get('view.paths')), [$sourcePath]), 'listroutes');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/listroutes');
        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'listroutes');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'listroutes');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}

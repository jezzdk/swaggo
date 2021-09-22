<?php

namespace Jezzdk\Swaggo;

use Illuminate\Support\ServiceProvider;
use Jezzdk\Swaggo\Console\SwaggoGenerate;

class SwaggoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'swaggo');

        $this->app->bind('swaggo', function ($app) {
            return new Swaggo();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SwaggoGenerate::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('swaggo.php'),
            ], 'config');
        }
    }
}

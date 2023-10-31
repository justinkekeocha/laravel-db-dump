<?php

namespace Justinkekeocha\LaravelDbDump;

use Illuminate\Support\ServiceProvider;
use Justinkekeocha\LaravelDbDump\Commands\DbDump;

class LaravelDbDumpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {    //Merge package config file with application config file with the same key
        $this->mergeConfigFrom(
            __DIR__ . '/../config/database-dumps.php',
            'database-dumps'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/database-dumps.php' => config_path('database-dumps.php')
            ], 'laravel-db-dump-config');

            $this->publishes([
                __DIR__ . '/Commands/FreshCommand.php' => app_path('Console/Commands/FreshCommand.php'),
            ], 'laravel-db-dump-config');


            $this->commands([
                DbDump::class,
            ]);
        }
    }
}

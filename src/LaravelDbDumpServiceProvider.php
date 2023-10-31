<?php

namespace Justinkekeocha\LaravelDbDump;

use Illuminate\Support\ServiceProvider;
use Justinkekeocha\LaravelDbDump\Commands\DbDump;
use Justinkekeocha\LaravelDbDump\Commands\DbDumpMigrateFresh;

class LaravelDbDumpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/database.php',
            'database'
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
            $this->commands([
                DbDump::class,
                DbDumpMigrateFresh::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/database.php' => config_path('database.php'),
        ]);
    }
}

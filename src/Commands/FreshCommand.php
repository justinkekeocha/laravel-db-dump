<?php

namespace App\Console\Commands;

use Illuminate\Database\Console\Migrations\FreshCommand as LaravelFreshCommand;

class FreshCommand extends LaravelFreshCommand
{


    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (config('database-dumps.enable')) {
            $this->call('db:dump');
        }
        parent::handle();
    }
}

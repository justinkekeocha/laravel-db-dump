<?php

namespace Justinkekeocha\LaravelDbDump\Commands;

use Illuminate\Database\Console\Migrations\FreshCommand;

class DbDumpMigrateFresh extends FreshCommand
{


    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (config('database.dumps.enable')) {
            $this->call('db:dump');
        }
        parent::handle();
    }
}

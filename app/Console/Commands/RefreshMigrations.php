<?php
// filepath: /c:/xampp/htdocs/rrhh-v2/app/Console/Commands/RefreshMigrations.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class RefreshMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:refresh-custom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh migrations omitting specific tables';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // List of tables to drop
        $tablesToDrop = [
            'table1',
            'table2',
            // Add more tables as needed
        ];

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Drop the specified tables
        foreach ($tablesToDrop as $table) {
            DB::statement("DROP TABLE IF EXISTS $table;");
        }

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Run migrate:refresh
        Artisan::call('migrate:refresh');

        $this->info('Migrations refreshed successfully, omitting specified tables.');

        return 0;
    }
}
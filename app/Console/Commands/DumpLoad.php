<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use mysqli;
use MySQLImport;

class DumpLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:load';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $db = new mysqli(
            env('DB_HOST'),
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE')
        );

        $import = new MySQLImport($db);

        try {
            $import->load(base_path('database/dumps/demo.sql'));
        } catch (Exception $e) {
            return $this->error('Couldn\'t import sql dump, the table must be empty.');
        }

        $this->info('Imported sql dump database/dumps/demo.sql');
    }
}

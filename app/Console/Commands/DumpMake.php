<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MySQLDump;
use mysqli;

class DumpMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:make';

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

        $dump = new MySQLDump($db);
        $dump->tables['*'] = MySQLDump::NONE;

        $dump->tables['lit_repeatables'] = MySQLDump::DATA;
        $dump->tables['lit_repeatable_translations'] = MySQLDump::DATA;
        $dump->tables['lit_relations'] = MySQLDump::DATA;
        $dump->tables['lit_forms'] = MySQLDump::DATA;
        $dump->tables['lit_form_translations'] = MySQLDump::DATA;
        $dump->tables['lit_list_items'] = MySQLDump::DATA;
        $dump->tables['lit_list_item_translations'] = MySQLDump::DATA;
        $dump->save(base_path('database/dumps/demo.sql'));

        $this->info('Created sql dump database/dumps/demo.sql');
    }
}

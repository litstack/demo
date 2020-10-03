<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the litstack demo.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh', ['--seed' => true]);
        $this->call('lit:install');
    }
}

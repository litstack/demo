<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Lit\Models\User;

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
        File::cleanDirectory(storage_path('app/public'));
        $this->line('Cleaned storage.');

        $this->call('migrate:fresh', ['--seed' => true]);
        $user = User::create([
            'first_name' => 'Admin',
            'last_name'  => '',
            'username'   => '',
            'email'      => 'demo@admin.com',
            'locale'     => 'en',
        ]);
        $user->password = bcrypt('secret');
        $user->save();

        $user->assignRole('admin');
    }
}

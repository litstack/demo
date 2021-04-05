<?php

namespace Database\Seeders;

use App\Models\FormIndexTable;
use App\Models\FormRelation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Lit\Config\Form\Pages\HomeConfig;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('dump:load');

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);

        $properties = ['title' => null, 'alt' => null];

        $home = HomeConfig::load();
        $home->addMedia(storage_path('dump/home/header_image.jpg'))
            ->preservingOriginal()
            ->withCustomProperties($properties)
            ->toMediaCollection('header_image');

        FormRelation::create([
            'user_id' => User::inRandomOrder()->first()->id,
        ]);

        FormIndexTable::factory(200)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'lit')->first();

        $adminRole->revokePermissionTo('update lit-role-permissions');
        $adminRole->revokePermissionTo('delete lit-users');

        $users = User::factory(10)->create();

        $users->each(function (User $user) {
            $properties = ['title' => null, 'alt' => null];

            $this->command->info("Downloading profile image for user with id [{$user->id}].");

            $user->addMediaFromUrl('https://source.unsplash.com/collection/4805779/600x600')
                ->preservingOriginal()
                ->withCustomProperties($properties)
                ->toMediaCollection('profile_image');
        });
    }
}

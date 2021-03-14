<?php

namespace Database\Seeders;

use App\Models\FormIndexTable;
use App\Models\FormRelation;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Lit\Config\Form\Pages\HomeConfig;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        $products = Product::factory(200)->create();
        $bookings = Order::factory(1000)->create();

        foreach ($bookings as $booking) {
            $productCount = rand(2, 10);
            for ($i = 0; $i < $productCount; $i++) {
                $product = $products->random();
                OrderProduct::factory(1)->create([
                    'order_id'   => $booking->id,
                    'product_id' => $product->id,
                    'price'      => $product->price,
                    'created_at' => $booking->created_at,
                ]);
            }
        }

        Artisan::call('dump:load');

        $properties = ['title' => null, 'alt' => null];

        $home = HomeConfig::load();
        $home->addMedia(storage_path('dump/home/header_image.jpg'))
            ->preservingOriginal()
            ->withCustomProperties($properties)
            ->toMediaCollection('header_image');

        $adminRole = Role::where('name', 'admin')->where('guard_name', 'lit')->first();

        $adminRole->revokePermissionTo('update lit-role-permissions');
        $adminRole->revokePermissionTo('delete lit-users');

        FormRelation::create([
            'user_id' => User::inRandomOrder()->first()->id,
        ]);

        FormIndexTable::factory(200)->create();
    }
}

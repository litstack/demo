<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

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
    }
}

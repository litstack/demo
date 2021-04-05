<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::factory(1000)->create();

        foreach ($orders as $booking) {
            $productCount = rand(2, 10);
            for ($i = 0; $i < $productCount; $i++) {
                $product = Product::inRandomOrder()->first();
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

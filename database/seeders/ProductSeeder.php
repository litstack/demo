<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory(10)->create();

        $faker = Container::getInstance()->make(Generator::class);

        $products->each(function (Product $product) {
            $properties = ['title' => null, 'alt' => null];

            $this->command->info("Downloading image for product with id [{$product->id}].");

            $product->addMediaFromUrl('https://source.unsplash.com/collection/2323310/600x600')
                ->preservingOriginal()
                ->withCustomProperties($properties)
                ->toMediaCollection('images');
        });
    }
}

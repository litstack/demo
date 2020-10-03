<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->productName,
            'description' => $this->faker->randomHtml(2, 3),
            'price'       => $this->faker->numberBetween(100, 15000) / 100,
            'publish_at'  => $this->faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now'),
        ];
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        $faker = parent::withFaker();

        $faker->addProvider(
            new \Bezhanov\Faker\Provider\Commerce($faker)
        );

        return $faker;
    }
}

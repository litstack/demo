<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Available providers.
     *
     * @var array
     */
    protected $providers = [
        'paypal', 'stripe', 'mollie',
    ];

    /**
     * Available states.
     *
     * @var array
     */
    protected $state = [
        'success', 'success', 'success', 'success', 'success', 'success',
        'pending', 'pending',
        'canceled',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'    => $this->faker->numberBetween(1, 100),
            'provider'   => $this->faker->randomElement($this->providers),
            'amount'     => $this->faker->numberBetween(1000, 150000) / 100,
            'state'      => $this->faker->randomElement($this->state),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now'),
        ];
    }
}

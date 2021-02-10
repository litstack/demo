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

            // Billing address.
            'billing_address_first_name' => $this->faker->firstName,
            'billing_address_last_name'  => $this->faker->lastName,
            'billing_address_company'    => $this->faker->lastName,
            'billing_address_street'     => $this->faker->address,
            'billing_address_zip'        => $this->faker->biasedNumberBetween(1000, 99999),
            'billing_address_city'       => $this->faker->city,
            'billing_address_state'      => $this->faker->state,
            'billing_address_country'    => $this->faker->country,
        ];
    }
}

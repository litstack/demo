<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
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
        'paypal', 'stripe', 'apple-pay',
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
        $user = User::inRandomOrder()->select('id', 'created_at')->first();

        return [
            'user_id'        => $user->id,
            'provider'       => $this->faker->randomElement($this->providers),
            'shipping_price' => 4.90,
            'subtotal'       => $subtotal = $this->faker->numberBetween(1000, 150000) / 100,
            'amount'         => $subtotal + 4.90,
            'state'          => $this->faker->randomElement($this->state),
            'created_at'     => $this->faker->dateTimeBetween(startDate: $user->created_at, endDate: 'now'),

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

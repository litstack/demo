<?php

namespace Database\Factories;

use App\Models\FormIndexTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormIndexTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormIndexTable::class;

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
            'title'      => $this->faker->word(),
            'html_text'  => $this->faker->randomHtml(3),
            'money'      => $this->faker->biasedNumberBetween(100, 10000),
            'active'     => $this->faker->boolean(),
            'progress'   => $this->faker->biasedNumberBetween(0, 100),
            'state'      => $this->faker->randomElement($this->state),
            'user_id'    => User::inRandomOrder()->first()?->id,
            'created_at' => $this->faker->dateTimeBetween(startDate: '-30days', endDate: 'now'),
        ];
    }
}

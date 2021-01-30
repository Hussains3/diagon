<?php

namespace Database\Factories;

use App\Models\Broker;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrokerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Broker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->firstNameMale,
            'phone' => $this->faker->phoneNumber,
            'commission' => $this->faker->numberBetween(20,30),
            'balance' => $this->faker->numberBetween(500,1000)
        ];
    }
}

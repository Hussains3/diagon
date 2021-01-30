<?php

namespace Database\Factories;

use App\Models\Expence;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'ammount' => $this->faker->numberBetween(100,500),
            'note' => $this->faker->sentence(6,true)
        ];
    }
}

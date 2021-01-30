<?php

namespace Database\Factories;

use App\Models\Appmode;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppmodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appmode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ['s-mode','d-mode','n-mode'][random_int(0, 2)],
            'threshold' => $this->faker->numberBetween(25000,50000),
            'currentAmmount' => $this->faker->numberBetween(0,10000),
            'status' => true
        ];
    }
}

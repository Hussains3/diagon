<?php

namespace Database\Factories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = \App\Models\Testcategory::get();

        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1,5000),
            'min_price' => $this->faker->numberBetween(1,2000),
            'category' => $category->random()->id,
            'cost' => $this->faker->numberBetween(0,200)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParameterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parameter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $test = \App\Models\Test::get();
        $unit = \App\Models\Unit::get();

        return [
            'name' => $this->faker->word(),
            'test_id' => $test->random()->id,
            'unit_id' => $unit->random()->id,
            'normal_range' => 'normal',
        ];
    }
}

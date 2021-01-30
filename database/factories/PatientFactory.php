<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        'name'=> $this->faker->name,
        'age' => $this->faker->numberBetween(10,40),
        'phone' => $this->faker->phoneNumber,
        'email' => $this->faker->safeEmail,
        'address' => $this->faker->address,
        'due' => $this->faker->numberBetween(0,500),
        'report' => $this->faker->numberBetween(1,5)
        ];
    }
}

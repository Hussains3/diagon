<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $patient = \App\Models\Patient::get();
        $user = \App\Models\User::get();
        $doctor = \App\Models\Doctor::get();

        return [

            'invoice' => $this->faker->numberBetween(0,25658),
            'patient_id' =>  $patient->random()->id,
            'user_id' => $user->random()->id,
            'doctor_id' => $doctor->random()->id,
            'subtotal' => $this->faker->numberBetween(1,5000),
            'vat' => $this->faker->numberBetween(1,5000),
            'discount' => $this->faker->numberBetween(1,5000),
            'netTotal' => $this->faker->numberBetween(1,5000),
            'paid' => $this->faker->numberBetween(1,5000),
            'due' => $this->faker->numberBetween(1,5000),
            'total_qty' => $this->faker->numberBetween(1,5000),
            'word' => $this->faker->word(),
            'status' => ['Due','Paid'][random_int(0,1)],
            'total_cost' => $this->faker->numberBetween(1,200)
        ];
    }
}

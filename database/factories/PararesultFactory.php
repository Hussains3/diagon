<?php

namespace Database\Factories;

use App\Models\Pararesult;
use Illuminate\Database\Eloquent\Factories\Factory;

class PararesultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pararesult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $saleItems = \App\Models\SaleItem::get();
        $patient = \App\Models\Patient::get();
        $parameter = \App\Models\Parameter::get();


        return [


            'saleItems_id' => $saleItems->random()->id,
            'patient_id' => $patient->random()->id,
            'parameter_id' => $parameter->random()->id,
            'result' => $this->faker->numberBetween(0,100),
            'note' => $this->faker->sentence(5,true),
        ];
    }
}

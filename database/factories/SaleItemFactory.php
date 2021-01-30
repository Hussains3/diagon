<?php

namespace Database\Factories;

use App\Models\SaleItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SaleItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $test = \App\Models\Test::get();
            $patient = \App\Models\Patient::get();
            $sale = \App\Models\Sale::get();

        return [

            'invoice' => $this->faker->unixTime('now'),
            'test_id' => $test->random()->id,
            'patient_id' => $patient->random()->id,
            'sale_id' => $sale->random()->id,
            'note' => $this->faker->sentence(6,true),
            'cost' => $this->faker->numberBetween(10, 199),
            'price' => $this->faker->numberBetween(200, 1000),
            'testDiscount' => $this->faker->numberBetween(0, 180),
            'sample_date' => $this->faker->date('Y-m-d','now'),
            'deli_date' => $this->faker->dateTimeBetween('now','5 days', null),
            'status' => 'Working on progress'
        ];
    }
}

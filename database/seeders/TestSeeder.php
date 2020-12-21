<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $test = new Test();
            $test->name = 'Chest X-ray';
            $test->price = 500;
            $test->min_price = 250;
            $test->category = 1;
            $test->save();
    }
}

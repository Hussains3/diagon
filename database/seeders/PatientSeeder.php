<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = new Patient();
        $patient->name = 'Sokina Begum';
        $patient->age = 32;
        $patient->phone = '01589456565';
        $patient->email = 'abc@mail.com';
        $patient->address = 'khulna, Bangladesh';
        $patient->due = 0;
        $patient->report = 1;
        $patient->save();
    }
}

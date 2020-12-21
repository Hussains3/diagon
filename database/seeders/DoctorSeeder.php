<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            $doc = new Doctor();
            $doc->name= 'Dr. Kazi Najrul Islam';
            $doc->degree= 'MBBS, BCS, FCPS';
            $doc->designation= 'Surgon';
            $doc->institution= 'KMCH';
            $doc->phone= '01478523695';           
            $doc->commission= 30;
            $doc->balance= 0;
            $doc->save();
    }
}

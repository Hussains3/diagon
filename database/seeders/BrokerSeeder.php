<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Broker;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $broker = new Broker();
        $broker->name= 'Akash';
        $broker->degree= 'N/A';
        $broker->designation= 'N/A';
        $broker->institution= 'N/A';
        $broker->phone= '01478523695';           
        $broker->commission= 10;
        $broker->balance= 0;
        $broker->save();
    }
}

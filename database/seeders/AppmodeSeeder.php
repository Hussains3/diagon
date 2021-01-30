<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appmode;

class AppmodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        $modename =['s-mode','d-mode','n-mode'];

        for ($i=0; $i < count($modename); $i++) {

            $mode = new Appmode();
            $mode->name = $modename[$i];
            $mode->threshold = 25000;
            $mode->currentAmmount = 0;
            $mode->status = true;
            $mode->save();
        }

    }
}

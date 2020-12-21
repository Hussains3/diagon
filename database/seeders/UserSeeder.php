<?php

namespace Database\Seeders;

// use App\User;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email','admin@app.com')->first();
        if (is_null($user)) {
            $user =new User();
            $user->name = "MD. Sabbir Hussain";
            $user->email = "admin@app.com";
            $user->profile_picture = "img/users/1607884917-profile.jpg";
            $user->signeture = "img/ver_ignature.png";
            $user->password = Hash::make('password');
            $user->address = 'Khulna, Bangladesh';
            $user->phone = '01956113999';
            $user->balance = 25000;
            $user->nid = '19929196210000052';
            $user->save();
        }
        

    }
}

            
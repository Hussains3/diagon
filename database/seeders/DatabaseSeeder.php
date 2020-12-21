<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(AppmodeSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(TestcategorySeeder::class);
        $this->call(TestSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
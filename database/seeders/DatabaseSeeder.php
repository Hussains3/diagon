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

        // \App\Models\Appmode::factory(3)->create();
        \App\Models\Doctor::factory(100)->create();
        \App\Models\Unit::factory(50)->create();
        \App\Models\Broker::factory(100)->create();
        \App\Models\Patient::factory(100)->create();
        \App\Models\Expence::factory(100)->create();
        \App\Models\Testcategory::factory(100)->create();
        \App\Models\Test::factory(50)->create();
        \App\Models\Parameter::factory(50)->create();
        \App\Models\Sale::factory(50)->create();
        \App\Models\SaleItem::factory(100)->create();
        \App\Models\Goption::factory(1)->create();
        \App\Models\Pararesult::factory(50)->create();

    }
}

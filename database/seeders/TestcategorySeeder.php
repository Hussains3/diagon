<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testcategory;

class TestcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Testcategory();
        $category->name= 'Bio Chemistry';
        $category->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            array('name'=>'Desktop'),
            array('name'=>'Laptop'),
            array('name'=>'Mobile phones'),
            array('name'=>'Consoles'),
        );

        DB::table('categories')->insert($categories);
    }
}

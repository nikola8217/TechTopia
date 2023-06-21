<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = array(
            array('name'=>'Lenovo'),
            array('name'=>'HP'),
            array('name'=>'Dell'),
            array('name'=>'Apple'),
            array('name'=>'Huawei'),
            array('name'=>'Sony Playstation'),
        );

        DB::table('brands')->insert($brands);
    }
}

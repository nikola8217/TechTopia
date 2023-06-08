<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array('name'=>'User'),
            array('name'=>'Admin'),
            array('name'=>'Manager')
            
        );

        DB::table('roles')->insert($roles);
    }
}

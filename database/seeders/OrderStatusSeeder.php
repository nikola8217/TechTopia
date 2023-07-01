<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_status = array(
            array('name'=>'Received'),
            array('name'=>'In preparation'),
            array('name'=>'Sent'),
            array('name'=>'Delivered'),
        );

        DB::table('orders_status')->insert($order_status);
    }
}

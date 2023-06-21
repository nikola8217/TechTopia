<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array(
                "name" => "LENOVO ThinkCentre",
                "price" => 91999.00,
                "discount" => 0,
                "price_with_discount" => 91999.00,
                "first_img" => "../images/komp1A.jpg",
                "second_img" => "../images/komp1B.jpg",
                "brand_id" => 1,
                "category_id" => 1
            ),
            array(
                "name" => "HP Pavilion",
                "price" => 124999.00,
                "discount" => 0,
                "price_with_discount" => 124999.00,
                "first_img" => "../images/komp2A.png",
                "second_img" => "../images/komp2B.jpg",
                "brand_id" => 2,
                "category_id" => 1
            ),
            array(
                "name" => "DELL Vostro",
                "price" => 93999.00,
                "discount" => 0,
                "price_with_discount" => 93999.00,
                "first_img" => "../images/komp3A.jpg",
                "second_img" => "../images/komp3B.jpg",
                "brand_id" => 3,
                "category_id" => 1
            ),
            array(
                "name" => "LENOVO IdeaPad 3",
                "price" => 74999.00,
                "discount" => 0,
                "price_with_discount" => 74999.00,
                "first_img" => "../images/lap1A.jpg",
                "second_img" => "../images/lap1B.jpg",
                "brand_id" => 1,
                "category_id" => 2
            ),
            array(
                "name" => "APPLE MacBook Pro",
                "price" => 243999.00,
                "discount" => 15.00,
                "price_with_discount" => 207399.15, 
                "first_img" => "../images/lap2A.png",
                "second_img" => "../images/lap2B.jpg",
                "brand_id" => 4,
                "category_id" => 2
            ),
            array(
                "name" => "APPLE iPhone 14 Plus",
                "price" => 138999.00,
                "discount" => 15.00,
                "price_with_discount" => 118149.15,
                "first_img" => "../images/mob1A.jpg",
                "second_img" => "../images/mob1B.jpg",
                "brand_id" => 4,
                "category_id" => 3
            ),
            array(
                "name" => "HUAWEI P50",
                "price" => 159999.00,
                "discount" => 0,
                "price_with_discount" => 159999.00,
                "first_img" => "../images/mob3A.png",
                "second_img" => "../images/mob3B.jpg",
                "brand_id" => 5,
                "category_id" => 3
            ),
            array(
                "name" => "SONY PlayStation 5",
                "price" => 79999.00,
                "discount" => 25.00,
                "price_with_discount" => 59999.25, 
                "first_img" => "../images/con1.png",
                "second_img" => "../images/con2B.jpg",
                "brand_id" => 6,
                "category_id" => 4
            ),
        );

        DB::table('products')->insert($products);
    }
}

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
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            BlogSeeder::class,
            OrderStatusSeeder::class
        ]);
    }
}

<?php

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
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UserSeeder::class);
        $this->call(CgySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(OrderSeeder::class);
    }
}

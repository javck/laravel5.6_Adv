<?php

use Illuminate\Database\Seeder;
use App\Cgy;
use Faker\Factory as Faker;

class CgySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cgy::truncate();
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            Cgy::create(['name'=>$faker->name , 'pic'=>$faker->imageUrl($width = 160, $height = 120) , 'url'=>$faker->url]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Item;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();
        $faker = Faker::create();
        for ($i=0; $i < 100; $i++) { 
            Item::create(['name'=>$faker->name ,'cgy_id'=>$faker->numberBetween($min = 1, $max = 10) ,'pic'=>$faker->imageUrl($width = 160, $height = 120) , 'desc'=>$faker->text($maxNbChars = 200) , 'price'=>$faker->numberBetween($min = 1000, $max = 9000)]);
        }
    }
}

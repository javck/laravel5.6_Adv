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
        for ($i = 0; $i < 10; $i++) {
            Cgy::create(['name' => $faker->name, 'pic' => $faker->imageUrl($width = 160, $height = 120), 'url' => $faker->url]);
        }
        Cgy::create(['name' => '分類A', 'pic' => 'images/about/1.jpg', 'url' => '#']);
        Cgy::create(['name' => '分類B', 'pic' => 'images/about/2.jpg', 'url' => '#']);
        Cgy::create(['name' => '分類C', 'pic' => 'images/about/3.jpg', 'url' => '#']);
        Cgy::create(['name' => '分類D', 'pic' => 'images/about/4.jpg', 'url' => '#']);
        Cgy::create(['name' => '電器類', 'pic' => $faker->imageUrl($width = 160, $height = 120), 'url' => $faker->url]);
        Cgy::create(['name' => '服飾類', 'pic' => $faker->imageUrl($width = 160, $height = 120), 'url' => $faker->url]);
        Cgy::create(['name' => '食品類', 'pic' => $faker->imageUrl($width = 160, $height = 120), 'url' => $faker->url]);
        Cgy::create(['name' => '食安類', 'pic' => $faker->imageUrl($width = 160, $height = 120), 'url' => $faker->url]);
    }
}

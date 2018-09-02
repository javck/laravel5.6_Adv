<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Item_Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        Item_Order::truncate();
        $faker = Faker::create();

        for ($i=1; $i < 1000; $i++) { 
            $order = Order::create(['user_id'=>$faker->numberBetween($min = 1, $max = 100),
                           'status'=>$faker->randomElement(['成立','已付款','已發貨','取消']),
                           'comment'=>$faker->sentence]);
            for ($j=0; $j < $faker->numberBetween($min = 1, $max = 5); $j++) { 
                // Item_Order::create(['order_id'=>$order->id , 
                //                     'item_id'=>$faker->numberBetween($min = 1, $max = 100), 
                //                     'qty'=>$faker->numberBetween($min = 1, $max = 10)]);
                $item_id = $faker->numberBetween($min = 1, $max = 100);
                $order->items()->attach($item_id, ['qty' => $faker->numberBetween($min = 1, $max = 10)]);
            }
            
        }
        
    }
}

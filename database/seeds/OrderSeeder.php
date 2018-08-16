<?php

use App\User;
use App\Order;
use App\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::customer()->pluck('id');
        $products = Product::all()->pluck('id')->toArray();
        foreach ($users as $user) {
            $items = array_rand($products, 3);
            foreach ($items as $item) {
                Order::create([
                    'address' => $faker->address,
                    'buyer_id' => $user,
                    'product_id' => $products[$item],
                ]);
            }
        }
    }
}

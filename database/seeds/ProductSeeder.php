<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        foreach (range(1, 50) as $value) {
            Product::create([
                'name' => $faker->sentence(),
                'price' => rand(100000, 50000000),
                'thumbnail' => 'default.jpg',
                'detail' => $faker->paragraph(),
                'status' => 1,
                'user_id' => 1,
                'category_id' => Category::get()->random()->id,
                'province_id' => rand(1, 5)
            ]);
        }
    }
}

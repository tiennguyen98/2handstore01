<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Product;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 26; $i<= 50; $i++) {
            Image::create([
                'file_name' => 'product' . $i . '.jpeg',
                'product_id' => Product::get()->random()->id
            ]);
        }
    }
}

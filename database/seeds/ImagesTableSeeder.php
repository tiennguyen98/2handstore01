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
        for($i = 1; $i<= 23; $i++)
        {
            Image::create([
                'file_name' => 'secondhand_' . $i . '.jpg',
                'product_id' => Product::get()->random()->id
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Thoi Trang',
            'Xe Co',
            'Laptop',
            'Dien Thoai',
            'Do Cong Nghe'
        ];
        
        foreach ($category as $value) {
            Category::create([
                'name' => $value,
                'slug' => str_slug($value),
                'thumbnail' => 'default.jpg',
                'parent_id' => null
            ]);
        }
    }
}

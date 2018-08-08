<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create()->each(function ($user) {
            factory(\App\Product::class, 3)->create([
                'user_id' => $user->id,
            ])->each(function ($product) {
                factory(\App\User::class, 5)->create()->each(function ($commentUser) use ($product) {
                    factory(\App\Comment::class)->create([
                        'user_id' => $commentUser->id,
                        'product_id' => $product->id,
                    ]);
                });
            });
        });
    }
}

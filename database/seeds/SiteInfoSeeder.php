<?php

use Illuminate\Database\Seeder;
use App\Option;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_info = [
            'title' => 'My Title',
            'description' => 'My Description',
            'keyword' => 'Keyword',
            'logo' => 'logo.png',
            'favicon' => 'favicon.ico',
            'address' => 'My Address',
            'phone' => 'My Phone Number',
            'email' => 'My Phone Email',
        ];

        foreach ($site_info as $key => $value) {
            Option::create([
                'key' => $key,
                'value' => $value
            ]);
        }
    }
}

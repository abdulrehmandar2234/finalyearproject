<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [

            [
                'category_link' => 'https://comuniti.pt/pt/63-arroz',
                'request_type' => 'GET',
                'scrape_method' => 'HTML',
                'website_id' => 1,
                'category_id' => 1,
            ],
            [
                'category_link' => 'https://goodafter.com/pt/258-ver-tudo',
                'request_type' => 'GET',
                'scrape_method' => 'HTML',
                'website_id' => 2,
                'category_id' => 2,
            ],
        ];
        DB::table('category_links')->insert($currencies);
    }
}

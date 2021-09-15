<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'name' => 'rice',
                'slug' => 'rice',
            ],
            [
                'name' => 'beverage',
                'slug' => 'beverage',
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}

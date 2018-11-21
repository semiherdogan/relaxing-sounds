<?php

use Illuminate\Database\Seeder;

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
            ['name' => 'Test Category 1'],
            ['name' => 'Test Category 2'],
            ['name' => 'Test Category 3'],
        ];

        \App\Category::insert($categories);
    }
}

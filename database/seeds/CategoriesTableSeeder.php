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
            ['name' => 'Test Category 1', 'order' => 1],
            ['name' => 'Test Category 2', 'order' => 2],
            ['name' => 'Test Category 3', 'order' => 3],
        ];

        \App\Category::insert($categories);
    }
}

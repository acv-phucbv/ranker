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
        $categoryDatas = [
            ['name' => 'php', 'slug' => 'php', 'description' => 'php'],
            ['name' => 'bootstrap', 'slug' => 'bootstrap', 'description' => 'bootstrap'],
            ['name' => 'mysql', 'slug' => 'mysql', 'description' => 'mysql']
        ];

        \DB::table('categories')->truncate();
        foreach ($categoryDatas as $categoryData) {
            \App\Models\Category::create($categoryData);
        }
    }
}

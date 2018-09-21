<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagDatas = [
            ['name' => 'php 7.1', 'slug' => 'php-71', 'description' => 'php 7.1'],
            ['name' => 'php 7.2', 'slug' => 'php-72', 'description' => 'php 7.2'],
            ['name' => 'bootstrap 4.0', 'slug' => 'bootstrap-40', 'description' => 'bootstrap 4.0'],
            ['name' => 'mysql 5.6', 'slug' => 'mysql-56', 'description' => 'mysql 5.6']
        ];

        \DB::table('tags')->truncate();
        foreach ($tagDatas as $tagData) {
            \App\Models\Tag::create($tagData);
        }
    }
}

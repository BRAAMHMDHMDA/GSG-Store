<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{

    public function run()
    {
        // ORM: Eloquent Model
//        Category::create([
//            'name' => 'Category Model',
//            'slug' => 'cateogry-model',
//            'status' => 'draft',
//        ]);

        // Query Builder
        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'name' => 'Category ' . $i,
                'slug' => 'cateogry-' . $i,
                'status' => 'active',
                'created_at' => '2021-07-26 12:52:06',
            ]);
        }
    }
}

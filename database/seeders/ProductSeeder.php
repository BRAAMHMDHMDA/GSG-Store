<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => "Dolar",
            'code' => "USD",
            'decimal_numbers' => 2,
            'is_primary' => 1,
        ]);
        Product::factory()->count(500)->create();

        $tags = Tag::all();

        Product::all()->each(function ($product) use ($tags) {
            $product->tags()->attach(
                $tags->random(rand(2, 4))->pluck('id')->toArray()
            );
        });
        }
}

<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $category = Category::inRandomOrder()
            ->limit(1)
            ->first(['id']);
        $brand = Brand::inRandomOrder()
            ->limit(1)
            ->first(['id']);

        $name = $this->faker->name();


        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'sku' => Str::slug($name),
            'category_id' => $category? $category->id : null,
            'brand_id' => $brand? $brand->id : null,
            'description' => $this->faker->words(200, true),
            'image_path' => 'products/main/8IuyJxOmTbjzm9MossO1Ywnij3o9njxP9cvqVNUm.jpg',
            'status' => 'active',
            'price' => $this->faker->randomFloat(2, 50, 2000),
            'quantity' => $this->faker->randomFloat(0, 0, 30),
        ];
    }
}

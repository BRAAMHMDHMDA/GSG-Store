<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(
            ['name' => "Samsung"],
        );
        Brand::create(
            ['name' => "Apple"]
        );
        Brand::create(
            ['name' => "Google"]
        );
        Brand::create(
            ['name' => "Coca-Cola"]
        );
        Brand::create(
            ['name' => "Nike"]
        );
        Brand::create(
            ['name' => "adidas"],
        );
        Brand::create(
            ['name' => "Microsoft"]
        );
        Brand::create(
            ['name' => "Intel"]
        );
        Brand::create(
            ['name' => "Visa"]
        );
        Brand::create(
            ['name' => "Lenovo"]
        );
        Brand::create(
            ['name' => "Zara"],
        );

        Brand::create(
            ['name' => "HP"],
        );
    }
}

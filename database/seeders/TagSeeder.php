<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 20; $i++) {
            Tag::create(
                ['name' => "tag $i", 'slug' => "tag-$i"]
            );
        }
    }
}

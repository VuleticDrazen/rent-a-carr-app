<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $categories =[

            ['kategorija'=>'Sedan'],
            ['kategorija'=>'SUV'],
            ['kategorija'=>'Karavan'],
            ['kategorija'=>'Hatchback']
        ];

        foreach ($categories as $category) {
            Category::query()->create($category);

        }
    }
}

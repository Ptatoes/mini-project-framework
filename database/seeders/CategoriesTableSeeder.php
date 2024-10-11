<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define specific categories or generate random ones
        $categories = ['Adventure', 'Relaxation', 'Cultural', 'Food', 'Photography'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        // Alternatively, generate a number of random categories
        // Category::factory()->count(5)->create();
    }
}

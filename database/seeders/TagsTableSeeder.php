<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define specific tags or generate random ones
        $tags = ['Beach', 'Hiking', 'Food', 'Photography', 'Nightlife', 'Wildlife'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }

        // Alternatively, generate a number of random tags
        // Tag::factory()->count(10)->create();
    }
}

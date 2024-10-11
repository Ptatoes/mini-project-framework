<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 20 posts
        Post::factory()
            ->count(20)
            ->create()
            ->each(function ($post) {
                // Attach 2-4 random tags to each post
                $tags = Tag::inRandomOrder()->take(rand(2, 4))->pluck('id');
                $post->tags()->attach($tags);
            });
    }
}

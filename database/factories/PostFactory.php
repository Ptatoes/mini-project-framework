<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Category;

class PostFactory extends Factory
{
    // Specify the corresponding model
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->sentence(6, true)), // e.g., "Exploring the Rocky Mountains"
            'content' => $this->faker->paragraphs(3, true), // Generates a multi-paragraph text
            'category_id' => Category::factory(), // Creates a new category if not provided
        ];
    }
}

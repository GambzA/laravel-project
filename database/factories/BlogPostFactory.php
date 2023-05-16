<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'content' => fake()->paragraphs(5, true),
        ];
    }

    public function defaults()
    {
        return $this->state(function (array $attributes) {
            return [
                'title' => 'New Title',
                'content' => 'Content of the new blogpost'
            ];
        });
    }
}

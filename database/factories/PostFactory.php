<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->word,
            'description' => $this->faker->sentence,
            'content'     => $this->faker->text(1000),
            'website_id'  => Website::all()->random()->id
        ];
    }
}

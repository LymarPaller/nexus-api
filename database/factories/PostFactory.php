<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        return [
            //
            'post_description' => fake()->words(5, true),
            'img_post' => fake()->imageUrl(
                $width = 640,
                $height = 480,
                $category = null,
                $randomize = true,
                $word = null,
                $gray = false,
                $format = 'png'
            ),
            'date_created' => fake()->dateTimeThisMonth(),
            'user_id' => User::factory(),
        ];
    }
}

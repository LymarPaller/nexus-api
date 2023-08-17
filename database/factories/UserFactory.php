<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name($gender = null),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password($minLength = 6, $maxLength = 12),
            'profile_photo' => fake()->imageUrl(),
            'cover_photo' => fake()->imageUrl(),
            'city' => fake()->state(),
            'websites' => fake()->email(),
            'introduction' => fake()->realText($maxNbChars = 20),
            'company' => fake()->company(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
//     public function unverified(): static
//     {
//         return $this->state(fn (array $attributes) => [
//             'email_verified_at' => null,
//         ]);
//     }
}

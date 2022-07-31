<?php

namespace Database\Factories;

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
        // faker by https://github.com/fzaninotto/Faker#fakerproviderlorem
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'created_at' => now()
        ];
    }
}

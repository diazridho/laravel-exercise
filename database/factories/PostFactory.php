<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str; // Import Str untuk menggunakan slug

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
            'title' => $title = fake()->sentence(3),
            'author_id' => User::factory(), // Agar ketika menjalankan post factory maka user factory akan otomatis jalan
            'slug'  => Str::slug($title), // agar variabel title menjadi slug
            'body' => fake()->sentence(50),
        ];
    }
}

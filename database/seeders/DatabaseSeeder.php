<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // Memanggil seeder
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        // Menjalankan post factory dengan recycle seeder user dan category
        Post::factory(100)
            ->recycle([
                User::all(),
                Category::all()
            ])->create();
    }
}

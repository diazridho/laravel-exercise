<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Artificial Intelligence',
            'slug' => 'artificial-intelligence',
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
        ]);

    }
}

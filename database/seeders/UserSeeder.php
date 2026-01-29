<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //Factory admin dan user biasa untuk di recycle
    public function run(): void
    {
        User::factory()->admin()->create();
        User::factory(5)->create();
    }
}

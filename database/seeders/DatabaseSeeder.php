<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create a specific user for testing/login
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Create some projects and products for the test user
        Project::factory()->count(5)->create([
            'user_id' => $testUser->id,
        ]);

        Product::factory()->count(15)->create([
            'user_id' => $testUser->id,
        ]);

        // 3. Create 10 more random users, and for each user, create related projects and products
        User::factory(10)->create()->each(function ($user) {
            Project::factory()->count(rand(2, 8))->create([
                'user_id' => $user->id,
            ]);
            Product::factory()->count(rand(5, 20))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}

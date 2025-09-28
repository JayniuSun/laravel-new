<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'user_id' => 1,
                'name' => 'Website Redesign',
                'description' => 'Redesign the company website to improve user experience and modernize the interface.',
                'due_date' => '2024-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Mobile App Development',
                'description' => 'Develop a new mobile application for both iOS and Android platforms.',
                'due_date' => '2025-03-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Marketing Campaign Launch',
                'description' => 'Plan and execute a new digital marketing campaign for the upcoming product launch.',
                'due_date' => '2024-11-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Database Optimization',
                'description' => 'Optimize the existing database for better performance and scalability.',
                'due_date' => '2024-10-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Internal Tool Development',
                'description' => 'Build a new internal tool to streamline project management workflows.',
                'due_date' => '2025-01-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
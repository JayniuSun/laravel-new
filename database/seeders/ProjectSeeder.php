<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'user_id' => 1,
                'name' => 'Website Redesign',
                'description' => 'Redesign the company website for a modern look and improved user experience.',
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
                'description' => 'Plan and execute a new digital marketing campaign to increase brand awareness.',
                'due_date' => '2024-11-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
}
    

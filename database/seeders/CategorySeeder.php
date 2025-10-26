<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'categories_name' => 'Electronic Devices',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Home Appliance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Sports Equipment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Books',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_name' => 'Sports Equipment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'user_id' => 1,
                'product_name' => 'Smartphone X',
                'category_id' => 1,
                'description' => 'A high-end smartphone with advanced features.',
                'price' => 7990000,
                'stock' => 50,
                'image' => 'smartphone_x.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_name' => 'Laptop Pro',
                'category_id' => 2,
                'description' => 'Powerful laptop for professionals and gamers.',
                'price' => 12000000,
                'stock' => 30,
                'image' => 'laptop_pro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_name' => 'Wireless Headphones',
                'category_id' => 3,
                'description' => 'Comfortable over-ear headphones with noise cancellation.',
                'price' => 2500000,
                'stock' => 100,
                'image' => 'headphones.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_name' => 'Smartwatch Series 5',
                'category_id' => 2,
                'description' => 'Track your fitness and stay connected on the go.',
                'price' => 3500000,
                'stock' => 75,
                'image' => 'smartwatch.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_name' => 'Portable Bluetooth Speaker',
                'category_id' => 4,
                'description' => 'Compact speaker with rich sound and long battery life.',
                'price' => 1200000,
                'stock' => 120,
                'image' => 'speaker.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
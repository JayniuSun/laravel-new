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
                'product_name' => 'Laptop',
                'description' => 'Powerful laptop for work and gaming',
                'price' => 12000000,
                'stock' => 50,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_name' => 'Smartphone',
                'description' => 'Latest model smartphone with advanced features',
                'price' => 8000000,
                'stock' => 100,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_name' => 'Headphones',
                'description' => 'Noise-cancelling over-ear headphones',
                'price' => 1500000,
                'stock' => 200,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a product can be created.
     *
     * @return void
     */
    public function test_a_product_can_be_created(): void
    {
        $user = User::factory()->create();

        $productData = [
            'user_id' => $user->id,
            'product_name' => 'New Awesome Product',
            'description' => 'This is a description for the new awesome product.',
            'price' => 150000,
            'stock' => 50,
        ];

        $product = Product::create($productData);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertDatabaseHas('products', $productData);
    }

    /**
     * Test a product can be updated.
     *
     * @return void
     */
    public function test_a_product_can_be_updated(): void
    {
        $product = Product::factory()->create(['price' => 100]);

        $product->update(['price' => 200]);

        $this->assertDatabaseHas('products', ['id' => $product->id, 'price' => 200]);
    }

    /**
     * Test a product can be soft deleted.
     *
     * @return void
     */
    public function test_a_product_can_be_soft_deleted(): void
    {
        $product = Product::factory()->create();
        $product->delete();
        $this->assertSoftDeleted($product);
    }

    /**
     * Test the relationship that a product belongs to a user.
     *
     * @return void
     */
    public function test_product_belongs_to_a_user(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $product->user);
        $this->assertEquals($user->id, $product->user->id);
    }
}

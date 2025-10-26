<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = auth()->user()->products()->orderBy('product_name', 'asc')->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            // 'product_name', 'description', 'price', 'stock', 'image'
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'required|string'
        ]);

        auth()->user()->products()->create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        $products = auth()->user()->products()->findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function edit($id)
    {
        $product = auth()->user()->products()->findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'required|string'
        ]);

        $products = auth()->user()->products()->findOrFail($id);
        $products->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $products = auth()->user()->products()->findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function deleteAll()
    {
        Product::truncate();
        return redirect()->route('products.index')->with('success', 'All products deleted successfully');
    }
    
}

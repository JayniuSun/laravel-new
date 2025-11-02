<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all(); untuk menampilkan data semua user

        $categories = auth()->user()->categories()->orderBy('categories_name', 'asc')->get();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'categories_name' => 'required|string|max:255',
        ]);
        
        auth()->user()->categories()->create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return view('categories.show', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categories_name' => 'required|string|max:255'
        ]);

        $category = auth()->user()->categories()->findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    public function deleteAll()
    {
        // uncheck foreign key constraint
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        return redirect()->route('categories.index')->with('success', 'All categories deleted successfully');
        
    }
}

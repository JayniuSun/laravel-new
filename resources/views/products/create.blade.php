<!-- create blade -->
 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('product_name') }}" required>
                            @error('product_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- 'product_name', 'description', 'price', 'stock', 'image' -->

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                            <input type="number" name="price" id="price" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('price') }}">
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
                            <input type="number" name="stock" id="stock" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('stock') }}">
                            @error('stock')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('image') }}" required>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" >{{ $category->categories_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
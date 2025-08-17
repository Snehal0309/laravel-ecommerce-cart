@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            ➕ Add New Product
        </h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Product Name -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Product Name</label>
                <input type="text" name="name" placeholder="Enter product name"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Price -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Price (₹)</label>
                <input type="number" name="price" placeholder="Enter product price"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
                @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" rows="4" placeholder="Enter product description"
                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <!-- Images -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Product Images</label>
                <input type="file" name="images[]" multiple
                       class="w-full text-gray-700 border rounded-lg file:mr-4 file:py-2 file:px-4
                              file:rounded-md file:border-0 file:text-sm file:font-semibold
                              file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-1">You can upload multiple images (JPG, PNG). Max size: 2MB each.</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('admin.products.index') }}"
                   class="text-gray-600 hover:text-gray-900 transition">
                    ← Back
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                    💾 Save Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

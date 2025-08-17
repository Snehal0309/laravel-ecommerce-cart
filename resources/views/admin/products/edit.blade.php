@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                   class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium">Price (₹)</label>
            <input type="number" step="0.01" name="price" 
                   value="{{ old('price', $product->price) }}" 
                   class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Update Images</label>
            <input type="file" name="images[]" multiple class="w-full border rounded p-2">
            <p class="text-sm text-gray-500">Leave empty if you don’t want to change images.</p>
        </div>

        <!-- Existing Images Preview -->
        @if($product->images->count())
            <div class="grid grid-cols-3 gap-2 mt-2">
                @foreach($product->images as $img)
                    <img src="{{ asset('storage/' . $img->path) }}" 
                         class="w-full h-24 object-cover rounded border">
                @endforeach
            </div>
        @endif

        <div class="flex justify-between items-center mt-4">
            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:underline">← Back</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

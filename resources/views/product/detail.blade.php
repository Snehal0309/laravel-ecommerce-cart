@extends('layout')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Product Details</h2>

    <div class="space-y-4">
        <div>
            <strong class="text-gray-700">Name:</strong>
            <span>{{ $product->name }}</span>
        </div>
        <div>
            <strong class="text-gray-700">Code:</strong>
            <span>{{ $product->code }}</span>
        </div>
        <div>
            <strong class="text-gray-700">Category:</strong>
            <span>{{ $product->category }}</span>
        </div>
        <div>
            <strong class="text-gray-700">Created At:</strong>
            <span>{{ $product->created_at->format('d-m-Y') }}</span>
        </div>
        <div>
            <strong class="text-gray-700">Product Image:</strong><br>
            <img src="{{ asset('uploads/' . $product->image) }}" class="h-40 mt-2 rounded shadow" alt="Product Image">
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('product.index') }}" class="text-blue-600 hover:underline">&larr; Back to List</a>
    </div>
</div>
@endsection

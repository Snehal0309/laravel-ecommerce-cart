@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Product List</h2>
    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">Name</th>
                <th class="p-3">Code</th>
                <th class="p-3">Category</th>
                <th class="p-3">Created</th>
                <th class="p-3">Product Image</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-t">
                <td class="p-3">{{ $product->name }}</td>
                <td class="p-3">{{ $product->code }}</td>
                <td class="p-3">{{ $product->category }}</td>
                <td class="p-3">{{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</td>
                <td class="p-3">
                    <img src="{{ asset('uploads/' . $product->image) }}" class="w-32 h-auto" alt="Product Image">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>  
    <div class="mt-4">
        {{ $products->links() }}
    </div>  
</div>
@endsection

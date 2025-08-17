@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="{{ route('admin.products.create') }}" 
       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
       + Add Product
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($products as $product)
        <div class="border rounded-lg shadow-sm bg-white p-4">
            <!-- Product Image -->
            @if($product->images->count())
                <img src="{{ asset('storage/' . $product->images->first()->path) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-40 object-cover rounded mb-3">
            @else
                <img src="https://via.placeholder.com/300x200" 
                     class="w-full h-40 object-cover rounded mb-3" alt="No Image">
            @endif

            <!-- Product Info -->
            <h2 class="font-semibold text-lg">{{ $product->name }}</h2>
            <p class="text-gray-600">₹{{ number_format($product->price, 2) }}</p>

            <!-- Actions -->
            <div class="flex justify-between items-center mt-3">
                <a href="{{ route('admin.products.show', $product) }}" 
                   class="text-blue-600 hover:underline">View</a>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                       class="text-yellow-500 hover:text-yellow-700" title="Edit">✏️</a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}" 
                          method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">🗑️</button>
                    </form>
                    <a href="#" 
   class="btn btn-success"
   onclick="event.preventDefault(); addToCart({{ $product->id }})">
   <i class="fa fa-shopping-cart"></i> Add to Cart
</a>

                            </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $products->links() }}
</div>
@endsection
@section('scripts')
<script>
function addToCart(productId) {
    fetch("/api/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message); // show success
    })
    .catch(err => console.log(err));
}
</script>
@endsection


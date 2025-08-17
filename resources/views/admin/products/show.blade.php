@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="row g-0">
            
            <!-- Product Images -->
            <div class="col-md-6 p-4">
                @if($product->images && count($product->images) > 0)
                    <!-- Main Image -->
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $product->images->first()->path) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded border" style="max-height:400px; object-fit:cover;">
                    </div>
                    <!-- Thumbnails -->
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" 
                                 alt="Product Image" 
                                 class="img-thumbnail me-2 mb-2" 
                                 style="width:100px;height:100px; object-fit:cover;">
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No images uploaded.</p>
                @endif
            </div>

            <!-- Product Info -->
            <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                <h2 class="fw-bold">{{ $product->name }}</h2>
                <p class="fs-4 text-success mb-3">₹{{ number_format($product->price, 2) }}</p>
                <p class="text-muted">{{ $product->description ?? 'No description available.' }}</p>

                <div class="mt-4">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        ← Back to Products
                    </a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary ms-2">
                        ✏️ Edit Product
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

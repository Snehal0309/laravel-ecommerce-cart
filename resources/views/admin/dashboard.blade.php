@extends('admin.layout')
@section('content')
  <h1 class="text-xl font-semibold mb-4">Dashboard</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white border rounded p-4">
      <div class="text-gray-500 text-sm">Products</div>
      <div class="text-3xl font-bold">{{ $stats['products'] }}</div>
    </div>
    <div class="row">
    <div class="col-md-3">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-box fa-3x mb-2 text-primary"></i>
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Manage all products</p>
                </div>
            </div>
        </a>
    </div>
</div>
  </div>
@endsection

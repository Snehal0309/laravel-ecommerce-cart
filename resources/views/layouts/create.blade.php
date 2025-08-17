@extends('layout')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('product.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block text-gray-700">Code</label>
            <input type="text" name="code" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
      
        

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-4xl mx-auto bg-white shadow rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Order #{{ $order->id }}</h2>

    <div class="mb-4">
        <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
        <p><strong>Status:</strong> 
            <span class="px-3 py-1 rounded text-xs font-medium
                {{ $order->status === 'Paid' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                {{ $order->status }}
            </span>
        </p>
        <p><strong>Total:</strong> ₹{{ number_format($order->total, 2) }}</p>
        <p><strong>Placed on:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
    </div>

    <h3 class="text-lg font-semibold mb-2">Items</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Product</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($order->items as $item)
                    <tr>
                        <td class="px-4 py-2">{{ $item->product->name }}</td>
                        <td class="px-4 py-2">{{ $item->quantity }}</td>
                        <td class="px-4 py-2">₹{{ number_format($item->price, 2) }}</td>
                        <td class="px-4 py-2">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.orders.index') }}" class="text-blue-600 hover:underline">← Back to Orders</a>
    </div>
</div>
@endsection

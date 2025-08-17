@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Orders</h2>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">User</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Created At</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)
                    <tr>
                        <td class="px-6 py-4">{{ $order->id }}</td>
                        <td class="px-6 py-4">{{ $order->user->name ?? 'Guest' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded text-xs font-medium
                                {{ $order->status === 'Paid' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold">₹{{ number_format($order->total, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.orders.show', $order->id) }}" 
                               class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

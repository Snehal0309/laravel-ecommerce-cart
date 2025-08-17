{{-- resources/views/admin/cart/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
  <h1 class="text-2xl font-bold">User #1 – Active Cart</h1>
</div>

@if(!$cart || $cart->items->isEmpty())
  <div class="bg-white rounded border p-6 text-gray-600">No items in cart.</div>
@else
  <div class="bg-white rounded border p-4">
    <table class="min-w-full">
      <thead>
        <tr class="text-left text-sm text-gray-500">
          <th class="p-2">Product</th>
          <th class="p-2">Price</th>
          <th class="p-2">Qty</th>
          <th class="p-2">Line Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart->items as $item)
          <tr class="border-t">
            <td class="p-2 flex items-center gap-3">
              @if($item->product->images->count())
                <img src="{{ asset('storage/'.$item->product->images->first()->path) }}" class="w-12 h-12 object-cover rounded">
              @endif
              <div>{{ $item->product->name }}</div>
            </td>
            <td class="p-2">₹{{ number_format($item->unit_price,2) }}</td>
            <td class="p-2">{{ $item->quantity }}</td>
            <td class="p-2 font-medium">₹{{ number_format($item->line_total,2) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="flex justify-end mt-4">
      <div class="w-full md:w-80 space-y-1 text-sm">
        <div class="flex justify-between"><span>Subtotal</span><span>₹{{ number_format($cart->subtotal,2) }}</span></div>
        <div class="flex justify-between"><span>Tax</span><span>₹{{ number_format($cart->tax,2) }}</span></div>
        <div class="flex justify-between"><span>Shipping</span><span>₹{{ number_format($cart->shipping,2) }}</span></div>
        <div class="flex justify-between font-semibold text-lg pt-2 border-t"><span>Total</span><span>₹{{ number_format($cart->total,2) }}</span></div>
      </div>
    </div>
  </div>
@endif
@endsection

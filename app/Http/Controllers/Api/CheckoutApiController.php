<?php

// app/Http/Controllers/Api/CheckoutController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    protected function userId(): int { return 1; }

    public function checkout(Request $request)
    {
        $cart = Cart::with('items')->where('user_id',$this->userId())->where('status','active')->firstOrFail();

        if ($cart->items->isEmpty()) {
            return response()->json(['message'=>'Cart is empty'], 422);
        }

        // Create Order (pending)
        $order = Order::create([
            'user_id'  => $this->userId(),
            'number'   => 'ORD-'.Str::upper(Str::random(8)),
            'status'   => 'pending',
            'subtotal' => $cart->subtotal,
            'tax'      => $cart->tax,
            'shipping' => $cart->shipping,
            'total'    => $cart->total,
        ]);

        foreach ($cart->items as $ci) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $ci->product_id,
                'quantity'   => $ci->quantity,
                'unit_price' => $ci->unit_price,
                'line_total' => $ci->line_total,
            ]);
        }

        // Create Stripe PaymentIntent
        $stripe = new StripeClient(config('services.stripe.secret'));
        $intent = $stripe->paymentIntents->create([
            'amount' => (int)round($order->total * 100), // in paise/cents
            'currency' => 'inr',                         // adjust if needed
            'metadata' => ['order_id' => $order->id, 'order_number' => $order->number],
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        Payment::create([
            'order_id' => $order->id,
            'provider' => 'stripe',
            'provider_payment_id' => $intent->id,
            'status' => 'requires_action',
            'amount' => $order->total,
            'payload' => $intent->toArray(),
        ]);

        // lock the cart (convert)
        $cart->update(['status'=>'converted']);

        return response()->json([
            'message' => 'Order created, complete payment using client_secret',
            'order_id' => $order->id,
            'order_number' => $order->number,
            'client_secret' => $intent->client_secret,
            'publishable_key' => config('services.stripe.key'),
        ]);
    }

    // Minimal confirmation endpoint to mark the order paid (for demo or webhook simulation)
    public function confirm(Request $request)
    {
        $data = $request->validate(['payment_intent_id' => 'required|string']);
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $intent = $stripe->paymentIntents->retrieve($data['payment_intent_id']);

        $payment = Payment::where('provider_payment_id',$intent->id)->firstOrFail();
        $payment->update([
            'status'  => $intent->status === 'succeeded' ? 'succeeded' : 'failed',
            'payload' => $intent->toArray(),
        ]);

        $order = $payment->order;
        $order->update(['status' => $intent->status === 'succeeded' ? 'paid' : 'failed']);

        return response()->json(['message'=>'Payment status updated','order_status'=>$order->status]);
    }
}

    
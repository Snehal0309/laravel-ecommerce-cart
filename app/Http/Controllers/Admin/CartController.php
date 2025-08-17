<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Task requirement: show cart for hardcoded user_id = 1
        $cart = Cart::with('items.product')->firstOrCreate([
            'user_id' => 1, 'status' => 'active'
        ]);
        $totals = $cart->totals();

        return view('admin.cart.index', compact('cart', 'totals'));
    }

     public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $cart = Cart::where('user_id', 1)
                    ->where('product_id', $request->product_id)
                    ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => 1,
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully']);
    }


     public function getCart()
    {
        $cartItems = Cart::with('product')->where('user_id', 1)->get();
        return response()->json($cartItems);
    }

    // CMS Cart List Page

    
}

<?php
// app/Http/Controllers/Admin/CartAdminController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class CartAdminController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['items.product.images'])
            ->where('user_id', 1)
            ->where('status','active')
            ->first();

        return view('admin.cart.index', compact('cart'));
    }
}

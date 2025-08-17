<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAutthController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutApiController;
Route::get('/products', [ProductApiController::class, 'index']); 
Route::post('/cart/add', [CartController::class, 'add']);


Route::prefix('cart')->group(function () {
Route::post('/cart/add', [CartController::class, 'add']);

                  // list items + totals
Route::post('/cart/add', [CartController::class, 'add']);
    Route::patch('items/{item}', [CartController::class, 'update']); // update qty
    Route::delete('items/{item}', [CartController::class, 'destroy']); // delete item
});

// Checkout (Stripe)
Route::post('/checkout', [CheckoutApiController::class, 'createPaymentIntent']);
Route::post('checkout', [CheckoutController::class, 'checkout']);    // create order + payment intent
Route::post('checkout/confirm', [CheckoutController::class, 'confirm']); //
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::Get('/test',function(){
    return ("intro=>Hello snmehal,name=>nshela bhosale");
});

Route::Post('/signup',[UserAutthController::class,'signup']);
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index() {
        $products = Product::with('images')->latest()->paginate(20);
        return ProductResource::collection($products);
    }
}

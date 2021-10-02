<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);

        return response()->json([
            'status' => true,
            'product' => $product
        ], 200);
    }
}

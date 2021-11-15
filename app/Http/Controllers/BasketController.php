<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function addProductToBasket(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity ?? 1;
        $product = Product::findOrFail($productId);

        $basket = Session::get('basket_products');

        if(isset($basket[$product->id])) {
            $basket[$product->id]['quantity'] += $quantity;
        } else {
            $basket[$product->id]['id'] = $product->id;
            $basket[$product->id]['quantity'] = $quantity;
        }

        Session::put('basket_products', $basket);

        return response()->json([
            'result' => true,
        ], 200);
    }

    public function getBasket()
    {
        $basket = Session::get('basket_products');
        $quantity = 0;
        $sum = 0;

        if(!empty($basket)){
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id']);
                $quantity +=  $productBasket['quantity'];
                $sum += ($productBasket['quantity'] * $product->sum);
            }
        }

        return response()->json([
            'result' => true,
            'quantity' => $quantity,
            'sum' => $sum
        ], 200);
    }

    public function fetchBasketProducts()
    {
        $basket = Session::get('basket_products');
        $sum = 0;
        $products = [];

        if(!empty($basket)){
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id']);
                $sum += ($productBasket['quantity'] * $product->sum);
                $product['quantity'] = $productBasket['quantity'];
                $products[] = $product;
            }
        }

        return response()->json([
            'result' => true,
            'products' => $products,
            'sum' => $sum
        ], 200);
    }

    public function changeQuantityProductInBasket(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity > 99 ? 99 : $request->quantity ?? 1;
        $product = Product::findOrFail($productId);

        $basket = Session::get('basket_products');

        if(isset($basket[$product->id])) {
            $basket[$product->id]['quantity'] = $quantity;
        } else {
            $basket[$product->id]['id'] = $product->id;
            $basket[$product->id]['quantity'] = $quantity;
        }

        Session::put('basket_products', $basket);

        return response()->json([
            'result' => true,
        ], 200);
    }

    public function removeOneProductFromBasket(Request $request)
    {
        $productId = $request->productId;
        $product = Product::findOrFail($productId);
        $removeAll = $request->removeAll ?? false;

        $basket = Session::get('basket_products');

        if(isset($basket[$product->id])) {
            if($basket[$product->id]['quantity'] !== 1 && !$removeAll){
                $basket[$product->id]['quantity'] -= 1;
            } else {
                unset($basket[$product->id]);
            }
        }

        Session::put('basket_products', $basket);

        return response()->json([
            'result' => true,
        ], 200);
    }

    public function removeAllBasket(Request $request)
    {
        Session::forget('basket_products');

        return response()->json([
            'result' => true,
        ], 200);
    }
}

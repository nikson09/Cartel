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
        $notRelatedProducts = [];
        $quantity = 0;

        if(!empty($basket)){
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id'])->toArray();
                $sum += ($productBasket['quantity'] * $product['sum']);
                $product['quantityProduct'] =  $product['quantity'];
                $product['quantity'] = $productBasket['quantity'];
                $quantity += $productBasket['quantity'];
                if($productBasket['quantity'] > $product['quantityProduct']){
                    $notRelatedProductsCount = $productBasket['quantity'] - $product['quantityProduct'];
                    $notRelatedProduct = $product;

                    $notRelatedProduct['quantity'] = $notRelatedProductsCount;
                    $notRelatedProduct['isRelated'] = false;

                    $notRelatedProducts[] = $notRelatedProduct;
                    $product['quantity'] = $productBasket['quantity'] - $notRelatedProductsCount;
                }
                $product['isRelated'] = true;

                if($product['quantity'] > 0){
                    $products[] = $product;
                }
            }
        }

        return response()->json([
            'result' => true,
            'products' => $products,
            'sum' => $sum,
            'quantity' => $quantity,
            'notRelatedProducts' => $notRelatedProducts
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
        $isRelated = $request->isRelated ?? true;

        $basket = Session::get('basket_products');

        if(isset($basket[$product->id])) {
            if($basket[$product->id]['quantity'] !== 1 && !$removeAll){
                $basket[$product->id]['quantity'] -= 1;
            } else {
                if((boolean)json_decode(strtolower($isRelated))){
                    unset($basket[$product->id]);
                } else {
                    $notRelatedProductCount = $basket[$product->id]['quantity'] - $product->quantity;
                    $basket[$product->id]['quantity'] -= $notRelatedProductCount;
                }
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

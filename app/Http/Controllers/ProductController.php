<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Country;
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

    public function productView($id, Request $request)
    {
        $product = Product::with(['country', 'category', 'brand', 'attributes'])->find($id);

        $category = $product->category;

        $countriesIds = Country::all()->pluck('id');

        $productCountries = Product::with('country')
            ->whereIn('country_id', $countriesIds)
            ->where('category_id', $category['id'])
            ->get()
            ->pluck('country')->toArray();

        $productCountries = array_unique($productCountries, SORT_REGULAR);

        $podCategories = Category::where('parent', $category['id'])->get();

        return view('product', [
            'product' => $product,
            'productCountries' => $productCountries,
            'podCategories' => $podCategories,
            'category' => $category
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Country;
use App\Product;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function brand(Request $request, $id, $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $brand = Brand::findOrFail($id);
        $products = Product::where([
            'category_id' => $categoryId,
            'brand_id' => $id
        ])->paginate(9);
        $countriesIds = Country::all()->pluck('id');
        $brandIds = Brand::all()->pluck('id');

        $productCountries = Product::with('country')
            ->whereIn('country_id', $countriesIds)
            ->where('category_id', $categoryId)
            ->get()
            ->pluck('country')->toArray();

        $productBrands = Product::with('brand')
            ->whereIn('brand_id', $brandIds)
            ->where('category_id', $categoryId)
            ->get()
            ->pluck('brand')->toArray();

        $productCountries = array_unique($productCountries, SORT_REGULAR);

        $productBrands = array_unique($productBrands, SORT_REGULAR);

        $podCategories = Category::where('parent', $categoryId)->get();

        return view('brand', [
            'category'  => $category,
            'brand' => $brand,
            'products' => $products,
            'productCountries' => $productCountries,
            'productBrands' => $productBrands,
            'podCategories' => $podCategories
        ]);
    }
}

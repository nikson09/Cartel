<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function category(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->paginate(9);
        $countriesIds = Country::all()->pluck('id');
        $productCountries = Product::with('country')
            ->whereIn('country_id', $countriesIds)
            ->where('category_id', $id)
            ->get()
            ->pluck('country')->toArray();

        $productCountries = array_unique($productCountries, SORT_REGULAR);

        return view('category', [
            'category'  => $category,
            'products' => $products,
            'productCountries' => $productCountries
        ]);
    }
}

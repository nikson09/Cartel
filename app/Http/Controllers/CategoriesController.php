<?php

namespace App\Http\Controllers;

use App\Baner;
use App\BanerRelation;
use App\Brand;
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
        $brandIds = Brand::all()->pluck('id');

        $productCountries = Product::with('country')
            ->whereIn('country_id', $countriesIds)
            ->where('category_id', $id)
            ->get()
            ->pluck('country')->toArray();

        $productBrands = Product::with('brand')
            ->whereIn('brand_id', $brandIds)
            ->where('category_id', $id)
            ->get()
            ->pluck('brand')->toArray();

        $productCountries = array_unique($productCountries, SORT_REGULAR);

        $productBrands = array_unique($productBrands, SORT_REGULAR);

        $podCategories = Category::where('parent', $id)->get();

        $banners = Baner::whereHas('bannerRelation', function ($query) use($category){
            return $query->where([
                'baner_type' => BanerRelation::CATEGORY,
                'related_id' => $category->id
            ]);
        })->get();

        return view('category', [
            'category'  => $category,
            'products' => $products,
            'productCountries' => $productCountries,
            'productBrands' => $productBrands,
            'podCategories' => $podCategories,
            'banners' => $banners
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Country;
use App\Product;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function bestsearch(Request $request)
    {


        $query = $request->input('s_search5');


        if ($query) {
            $products = Product::with(['country', 'category', 'brand'])->where('name', 'like',
                '%' . $query . '%')->limit(10)->get();
            //


            return response()->json($products);
        }

        return response()->json([]);
    }

    public function searchResults(Request $request)
    {
        $query = $request->input('s_search5');
        $page = $request->input('page', 1);
        $perPage = $request->get('perPage', 10);
        if ($query) {
            // Пагинация с запросом
            $productsQuery = Product::with(['country', 'category', 'brand'])->where('name', 'like', '%' . $query . '%');


            $price = [
                'min' => $productsQuery->min('sum'),
                'max' => $productsQuery->max('sum'),
            ];
            $products = $productsQuery->paginate($perPage);


            $categories = Category::all();
            $brands = Brand::all();
            $countries = Country::all();
            return view('searchResults',
                compact('products', 'categories', 'brands', 'brands', 'countries', 'price', 'query'));
        }
    }

    public function filter(Request $request)
    {
        $query = Product::query();


        // филитр по категориям
        if (!empty($request->categories)) {
            $query->whereIn('category_id', $request->categories);
        }

        // по брендам
        if (!empty($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
        }

        //  по странам
        if (!empty($request->countries)) {
            $query->whereIn('country_id', $request->countries);
        }

        //по наличию
        if ($request->has('is_sales') && $request->is_sales) {
            $query->where('is_sales', '>', 0);
        }

        // //  по скидке
        if ($request->has('discount_percent') && $request->discount_percent) {
            $query->where('discount_percent', '>', 0);
        }

        if ($request->has('priceRange') && isset($request->priceRange['min'], $request->priceRange['max']) && is_numeric($request->priceRange['min']) && is_numeric($request->priceRange['max'])) {
            $query->whereBetween('sum', [
                (float)$request->priceRange['min'],
                (float)$request->priceRange['max'],
            ]);
        }

        $perPage = $request->get('perPage', 10);
        $page = $request->get('page', 1);
        $products = $query->with(['category', 'brand', 'country'])->paginate($perPage);
        return response()->json([
            'data' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'total' => $products->total()
        ]);
    }
}

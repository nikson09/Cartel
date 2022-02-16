<?php

namespace App\Http\Controllers;

use App\BarMenu;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class OptController extends Controller
{
    public function index()
    {
        $categories = Category::where([
            'status' => true
        ])->whereNull('parent')->get();
        $barMenus   = BarMenu::where('active', true)->get();
        return view('opt', compact([
            'categories',
            'barMenus'
        ]));
    }

    public function getProducts()
    {
        $products = Product::all();

        return response()->json([
            'products' => $products
        ], 200);
    }
}

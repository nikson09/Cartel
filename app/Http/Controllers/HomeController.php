<?php

namespace App\Http\Controllers;

use App\BarMenu;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where([
            'status' => true
            ])->whereNull('parent')->get();
        $barMenus   = BarMenu::where('active', true)->get();
        $latestProducts = Product::with(['country', 'category', 'brand'])->where(['is_new' => true])->get();
        $recomendedProducts = Product::with(['country', 'category', 'brand'])->where(['is_recomended' => true])->get();

        return view('home',
        [
            'categories' => $categories,
            'barMenus' => $barMenus,
            'latestProducts' => $latestProducts
        ]);
    }
}

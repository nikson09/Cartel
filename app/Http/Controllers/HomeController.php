<?php

namespace App\Http\Controllers;

use App\Baner;
use App\BanerRelation;
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
            ])->whereNull('parent')->orderBy('sort_order', 'Asc')->get();
        $barMenus   = BarMenu::where('active', true)->orderBy('sort_order', 'Asc')->get();
        $latestProducts = Product::with(['country', 'category', 'brand'])->where(['is_new' => true])->get();
        $recommendedProducts = Product::with(['country', 'category', 'brand'])->where(['is_recomended' => true])->get();
        $banners = Baner::whereHas('bannerRelation', function ($query) {
            return $query->where('baner_type', BanerRelation::HOME);
        })->get();

        return view('home',
        [
            'categories' => $categories,
            'barMenus' => $barMenus,
            'latestProducts' => $latestProducts,
            'recommendedProducts' => $recommendedProducts,
            'banners' => $banners
        ]);
    }
}

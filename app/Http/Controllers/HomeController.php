<?php

namespace App\Http\Controllers;

use App\BarMenu;
use App\Category;
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
        $categories = Category::where('status', true)->get();
        $barMenus   = BarMenu::where('active', true)->get();

        return view('home',
        [
            'categories' => $categories,
            'barMenus' => $barMenus
        ]);
    }
}

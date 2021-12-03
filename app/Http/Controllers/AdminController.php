<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $pageSlug = 'main';
        return view('admin.welcome', ['pageSlug' => $pageSlug]);
    }

    public function icons()
    {
        $pageSlug = 'icons';
        return view('admin.pages.icons', ['pageSlug' => $pageSlug]);
    }

    public function products()
    {
        $pageSlug = 'products';
        return view('admin.pages.products', ['pageSlug' => $pageSlug]);
    }

    public function productAttributes()
    {
        $pageSlug = 'product_attributes';
        return view('admin.pages.product_attributes', ['pageSlug' => $pageSlug]);
    }

    public function categories()
    {
        $pageSlug = 'categories';
        return view('admin.pages.categories', ['pageSlug' => $pageSlug]);
    }

    public function brands()
    {
        $pageSlug = 'brands';
        return view('admin.pages.brands', ['pageSlug' => $pageSlug]);
    }

    public function countries()
    {
        $pageSlug = 'countries';
        return view('admin.pages.countries', ['pageSlug' => $pageSlug]);
    }

    public function barMenus()
    {
        $pageSlug = 'bar-menu';
        return view('admin.pages.bar_menus', ['pageSlug' => $pageSlug]);
    }

    public function banners()
    {
        $pageSlug = 'banners';
        return view('admin.pages.banners', ['pageSlug' => $pageSlug]);
    }

    public function orders()
    {
        $pageSlug = 'orders';
        return view('admin.pages.orders', ['pageSlug' => $pageSlug]);
    }
}

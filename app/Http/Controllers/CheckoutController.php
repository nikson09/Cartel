<?php

namespace App\Http\Controllers;

use App\BarMenu;
use App\Category;
use App\Product;
use App\Services\NovaPoshtaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * @var NovaPoshtaService
     */
    public NovaPoshtaService $novaPoshtaService;

    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        $this->novaPoshtaService = new NovaPoshtaService();
    }

    public function checkout()
    {
        $basket = Session::get('basket_products');
        $sum = 0;
        $products = [];
        $quantity = 0;

        if(empty($basket)){
            return redirect(route('home'));
        } else {
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id']);
                $sum += ($productBasket['quantity'] * $product->sum);
                $product['quantity'] = $productBasket['quantity'];
                $quantity += $productBasket['quantity'];
                $products[] = $product;
            }
        }

        $categories = Category::where([
            'status' => true
        ])->whereNull('parent')->get();


        return view('checkout', [
            'categories' => $categories,
            'products' => $products,
            'sum' => $sum,
            'quantity' => $quantity
        ]);
    }

    public function getRegions()
    {
        $regions = $this->novaPoshtaService->getRegions();

        return response()->json($regions);
    }

    public function getRegionCities(Request $request)
    {
        $region = $request->get('region');

        $cities = $this->novaPoshtaService
            ->getRegionCities($region);

        return response()->json($cities);
    }

    public function getPostalOffices(Request $request)
    {
        $city = $request->get('city');
        $region = $request->get('region');

        $postalOffices = $this->novaPoshtaService
            ->getPostalOffices($city, $region);

        return response()->json($postalOffices);
    }
}

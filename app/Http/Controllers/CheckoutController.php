<?php

namespace App\Http\Controllers;

use App\BarMenu;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\OrderUser;
use App\Product;
use App\Services\NovaPoshtaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\createOrder;

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
        $notRelatedProducts = [];

        if(empty($basket)){
            return redirect(route('home'));
        } else {
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id'])->toArray();
                $sum += ($productBasket['quantity'] * $product['sum']);
                $product['quantityProduct'] =  $product['quantity'];
                $product['quantity'] = $productBasket['quantity'];
                $quantity += $productBasket['quantity'];
                if($productBasket['quantity'] > $product['quantityProduct']){
                    $notRelatedProductsCount = $productBasket['quantity'] - $product['quantityProduct'];
                    $notRelatedProduct = $product;

                    $notRelatedProduct['quantity'] = $notRelatedProductsCount;
                    $notRelatedProduct['isRelated'] = false;

                    $notRelatedProducts[] = $notRelatedProduct;
                    $product['quantity'] = $productBasket['quantity'] - $notRelatedProductsCount;
                }
                $product['isRelated'] = true;

                if($product['quantity'] > 0){
                    $products[] = $product;
                }
            }
        }

        $categories = Category::where([
            'status' => true
        ])->whereNull('parent')->orderBy('sort_order', 'Asc')->get();

        $user = auth()->user();

        $cities = '';
        $departaments = '';
        $regions = $this->getRegionsCheckout();
        dd($regions);
        if(!empty($user)){
            $cities = !empty($user->region) ? $this->getRegionCitiesCheckout($user->region) : [];
            $departaments = !empty($user->region) && !empty($user->cities) ? $this->getPostalOfficesCheckout($user->cities, $user->region) : [];
        }

        return view('checkout', [
            'categories' => $categories,
            'products' => $products,
            'sum' => $sum,
            'quantity' => $quantity,
            'user' => $user,
            'cities' => $cities,
            'departaments' => $departaments,
            'regions' => $regions,
            'notRelatedProducts' => $notRelatedProducts
        ]);
    }

    public function getRegions()
    {
        $regions = $this->novaPoshtaService->getRegions();

        return response()->json([
            'regions' => $regions
        ], 200);
    }

    public function getRegionCities(Request $request)
    {
        $region = $request->get('region');
        $cities = [];
        $isRegionExist = $this->checkRegion($region);

        if($isRegionExist){
            $cities = $this->novaPoshtaService
                ->getRegionCities($region);
        }

        return response()->json([
            'cities' => $cities,
            'isRegionExist' => $isRegionExist
        ], 200);
    }

    public function getPostalOffices(Request $request)
    {
        $city = $request->get('city');
        $region = $request->get('region');
        $postalOffices = [];
        $isCityExist = $this->checkCity($region, $city);

        if($isCityExist){
            $postalOffices = $this->novaPoshtaService
                ->getPostalOffices($city, $region);
        }

        return response()->json([
            'postalOffices' => $postalOffices,
            'isCityExist' => $isCityExist
        ], 200);
    }

    public function checkRegion($region)
    {
        $result = false;
        $regions = $this->novaPoshtaService->getRegions();

        foreach($regions as $regionResponse){
            if($regionResponse == $region){
                $result = true;
            }
        }

        return $result;
    }

    public function checkCity($region, $city)
    {
        $result = false;
        $cities = $this->novaPoshtaService
            ->getRegionCities($region);
        foreach($cities as $cityResponse){
            if($cityResponse['name'] == $city){
                $result = true;
            }
        }

        return $result;
    }

    public function submitCheckout(createOrder $request)
    {
        $form = $request->all();
        $total = 0;
        $result = false;
        $redirect = route('home');

        $basket = Session::get('basket_products');
        $notRelatedProducts = [];
        $products = [];

        if(!empty($basket)){
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id'])->toArray();
                $total += ($productBasket['quantity'] * $product['sum']);
                $product['quantityProduct'] =  $product['quantity'];
                $product['quantity'] = $productBasket['quantity'];
                if($productBasket['quantity'] > $product['quantityProduct']){
                    $notRelatedProductsCount = $productBasket['quantity'] - $product['quantityProduct'];
                    $notRelatedProduct = $product;

                    $notRelatedProduct['quantity'] = $notRelatedProductsCount;
                    $notRelatedProduct['isRelated'] = false;

                    $notRelatedProducts[] = $notRelatedProduct;
                    $product['quantity'] = $productBasket['quantity'] - $notRelatedProductsCount;
                }
                $product['isRelated'] = true;

                if($product['quantity'] > 0){
                    $products[] = $product;
                }
            }

            $user = auth()->user();
            $orderUser = OrderUser::create([
                'phone' => $form['phone'],
                'name' => $form['firstName'],
                'LastName' => $form['lastName'],
                'region' => $form['regions'],
                'cities' => $form['cities'],
                'department' => $form['department'],
                'user_id' => !empty($user) ? $user->id : null
            ]);

            $order = Order::create([
                'user_order_status' => Order::ACTIVE,
                'order_user_id' => $orderUser->id,
                'comment' => $form['comment'],
                'sum' => $total
            ]);


            foreach($products as $product){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'sum' => $product['sum'],
                    'discount_percent' => $product['discount_percent'],
                    'is_sales' => $product['is_sales'],
                ]);

                $product = Product::find($product['id']);
                $product->quantity -= $product['quantity'];
                $product->update();
            }

            foreach($notRelatedProducts as $product){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'sum' => $product['sum'],
                    'discount_percent' => $product['discount_percent'],
                    'is_sales' => $product['is_sales'],
                    'isPreOrder' => true
                ]);
            }

            $redirect = route('success', [
                'id' => $order->id
            ]);

            $result = true;

            Session::forget('basket_products');

            $token = Env('TELEGRAM_BOT_TOKEN', '2125877363:AAFokloWSEe1FiCwo6u9hkNW646-nDcsCwY');
            $chatId =  Env('TELEGRAM_CHAT_ID',"-757209315");
            $txt = '';
            $messages = '
                <b>Новый заказ на Картеле :</b>
                <b>Имя покупателя:</b> '.$orderUser->name.'
                <b>Телефон:</b> '.$orderUser->phone.'
                <b>Область доставки:</b> '.$orderUser->region .'
                <b>Город доставки:</b> '.$orderUser->cities.'
                <b>Отделение новой почты:</b> '.$orderUser->department.'
                <b>'.$order->sum  .' грн</b> - стоимость заказа
                <b>Комментарий к заказу:</b> '.$order->comment.'
                <b>Ссылка на заказ:</b> '. route('admin.view.order', [ 'id' => $order->id]).''
            ;

            $endpoint = "https://api.telegram.org/bot{$token}/sendMessage";

            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', $endpoint, ['query' => [
                'chat_id' => $chatId,
                'parse_mode' => 'html',
                'text' => $messages
            ]]);


            $statusCode = $response->getStatusCode();
            $content = $response->getBody();

        }

        return response()->json([
            'result' => $result,
            'redirect' => $redirect
        ], 200);
    }

    public function success($id)
    {
        $order = Order::where('user_order_status', Order::ACTIVE)->findOrFail($id);

        $categories = Category::where([
            'status' => true
        ])->whereNull('parent')->orderBy('sort_order', 'Asc')->get();

        return view('success', [
            'categories' => $categories
        ]);
    }

    public function getRegionCitiesCheckout($region)
    {
        $cities = [];
        $isRegionExist = $this->checkRegion($region);

        if($isRegionExist){
            $cities = $this->novaPoshtaService
                ->getRegionCities($region);
        }

        return $cities;
    }

    public function getPostalOfficesCheckout($city, $region)
    {
        $postalOffices = [];
        $isCityExist = $this->checkCity($region, $city);

        if($isCityExist){
            $postalOffices = $this->novaPoshtaService
                ->getPostalOffices($city, $region);
        }

        return $postalOffices;
    }

    public function getRegionsCheckout()
    {
        $regions = $this->novaPoshtaService->getRegions();

        return $regions;
    }
}

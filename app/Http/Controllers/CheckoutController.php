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

        if(!empty($basket)){
            foreach($basket as $productBasket){
                $product = Product::find($productBasket['id']);
                $total += ($productBasket['quantity'] * $product->sum);
                $product['quantity'] = $productBasket['quantity'];
                $products[] = $product;
            }

            $orderUser = OrderUser::create([
                'phone' => $form['phone'],
                'name' => $form['firstName'],
                'LastName' => $form['lastName'],
                'region' => $form['regions'],
                'cities' => $form['cities'],
                'department' => $form['department']
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
                    'is_sales' => $product['is_sales']
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
        ])->whereNull('parent')->get();

        return view('success', [
            'categories' => $categories
        ]);
    }
}

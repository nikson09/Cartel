<?php

namespace App\Http\Controllers;

use App\BarMenu;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\OrderUser;
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
        $products = Product::all();
        $user = auth()->user();

        return view('opt', compact([
            'categories',
            'barMenus',
            'products',
            'user'
        ]));
    }

    public function getProducts()
    {
        $products = Product::all();

        return response()->json([
            'products' => $products
        ], 200);
    }

    public function checkout(Request $request)
    {
        $basketProducts = $request->products;
        $success = true;
        $errors = [];
        $total = 0;
        $products = [];

        if(!empty($basketProducts)){
            foreach($basketProducts as $productBasket){
                $product = Product::find($productBasket['id'])->toArray();
                $total += ($productBasket['count'] * $product['sum']);
                $product['quantityProduct'] =  $product['quantity'];
                $product['quantity'] = $productBasket['count'];
                if($productBasket['count'] > $product['quantityProduct']){
                    $notRelatedProductsCount = $productBasket['count'] - $product['quantityProduct'];
                    $product['quantity'] = $productBasket['count'] - $notRelatedProductsCount;
                }
                if($product['quantity'] > 0){
                    $products[] = $product;
                }
            }
        }

        $user = auth()->user();
        if(empty($user)){
            $errors[] = 'Авторизируйтесь заново или обновите страницу!';
        } else {
            if(empty($user['phone'])){
                $errors[] = 'В вашей учетной записи нет телефона';
            }

            if(empty($user['region'])){
                $errors[] = 'В вашей учетной записи нет региона';
            }

            if(empty($user['cities'])){
                $errors[] = 'В вашей учетной записи нет города';
            }

            if(empty($user['department'])){
                $errors[] = 'В вашей учетной записи нет отдела новой почты';
            }
        }

        if(empty($errors)){
            $orderUser = OrderUser::create([
                'phone' => $user['phone'],
                'name' => $user['name'] ?? '',
                'LastName' => $user['LastName'] ?? '',
                'region' => $user['region'],
                'cities' => $user['cities'],
                'department' => $user['department'],
                'user_id' => !empty($user) ? $user->id : null
            ]);

            $order = Order::create([
                'user_order_status' => Order::ACTIVE,
                'order_user_id' => $orderUser->id,
                'comment' => 'Оптовый заказ',
                'sum' => $total
            ]);

            if(!empty($products)){
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
            }

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
        } else {
            $success = false;
        }

        return response()->json([
            'success' => $success,
            'errors' => $errors
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderUser;
use App\Product;
use App\Services\NovaPoshtaService;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CabinetController extends Controller
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

    public function home()
    {
        $user = auth()->user();
        $cities = !empty($user->region) ? $this->getRegionCities($user->region) : [];
        $departaments = !empty($user->region) && !empty($user->cities) ? $this->getPostalOffices($user->cities, $user->region) : [];
        $regions = $this->getRegions();

        return view('cabinet.cabinet',
        [
            'user' => $user,
            'cities' => $cities,
            'departaments' => $departaments,
            'regions' => $regions
        ]);
    }

    public function orders()
    {
        return view('cabinet.orders');
    }

    public function getRegions()
    {
        $regions = $this->novaPoshtaService->getRegions();

        return $regions;
    }

    public function getRegionCities($region)
    {
        $cities = [];
        $isRegionExist = $this->checkRegion($region);

        if($isRegionExist){
            $cities = $this->novaPoshtaService
                ->getRegionCities($region);
        }

        return $cities;
    }

    public function getPostalOffices($city, $region)
    {
        $postalOffices = [];
        $isCityExist = $this->checkCity($region, $city);

        if($isCityExist){
            $postalOffices = $this->novaPoshtaService
                ->getPostalOffices($city, $region);
        }

        return $postalOffices;
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

    public function changeUser(Request $request)
    {
        $user = auth()->user();
        $form = $request->all();
        $user->phone = $form['phone'];
        $user->name = $form['firstName'];
        $user->department = $form['department'];
        $user->LastName = $form['lastName'];
        $user->region = $form['regions'];
        $user->cities = $form['cities'];
        $user->update();

        return response()->json([
            'result' => true
        ], 200);
    }

    public function getOrders(Request $request)
    {
        $userId = auth()->user()->id;

        $orders = OrderUser::query()->with(['order'])->where('user_id', $userId);
        return Datatables::of($orders)
            ->addColumn('advanced', function ($row) {
                return '<a
                            style="margin-right:5px"
                            class="btn btn-outline-dark fa fa-eye"
                            href="javascript:void(0);"
                            onclick="getOrderDetail('. $row->order->id .')">
                        </a>';
            })
            ->addColumn('id', function ($row) {
                return $row->order->id;
            })
            ->addColumn('sum', function ($row) {
                return $row->order->sum . ' грн';
            })
            ->addColumn('quantity', function ($row) {
                $quantity = 0;
                foreach($row->order->products as $product){
                    $quantity += $product->quantity;
                }
                return $quantity;
            })
            ->addColumn('status', function ($row) {
                return Order::STASUSES[$row->order->user_order_status];
            })
            ->rawColumns(['id', 'sum', 'quantity', 'advanced', 'status'])
            ->make(true);
    }

    public function fetchBasketProductsForOrders($id)
    {
        $user = auth()->user();

        if(empty($user)){
            abort(404);
        }

        $order = Order::where('id', $id)
            ->with('products')
            ->whereHas('user', function ($query) use ($user) {
               return $query->where('user_id', '=', $user->id);
           })->first();

        $sum = 0;
        $products = [];
        $notRelatedProducts = [];
        $quantity = 0;

        if(!empty($order->products)){
            foreach($order->products as $productBasket){
                $product = Product::find($productBasket->product_id);
                $sum += ($productBasket->quantity * $product->sum);
                $product['quantity'] = $productBasket->quantity;
                $quantity += $productBasket->quantity;
                $product['isPreOrder'] = $productBasket->isPreOrder;
                if($productBasket->isPreOrder){
                    $notRelatedProducts[] = $product;
                } else {
                    $products[] = $product;
                }
            }
        }

        return response()->json([
            'result' => true,
            'products' => $products,
            'sum' => $sum,
            'quantity' => $quantity,
            'notRelatedProducts' => $notRelatedProducts
        ], 200);
    }
}

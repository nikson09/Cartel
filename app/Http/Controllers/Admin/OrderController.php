<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function viewOrder($id)
    {
        $pageSlug = 'orders';
        $order = Order::with(['user', 'products'])->find($id);
        $statuses = Order::STASUSES;

        return view('admin.order.view', [
            'pageSlug' => $pageSlug,
            'order' => $order,
            'statuses' => $statuses
        ]);
    }

    public function getOrders()
    {
        $orders = Order::query()->with(['user', 'products']);
        return Datatables::of($orders)
            ->addColumn('action', function ($row) {
                return '<a style="margin-right:5px" class="btn btn-outline-dark fa fa-wrench" href="'. route('admin.view.order', ['id' => $row->id]) .'"></a>';
            })
            ->addColumn('first_name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('last_name', function ($row) {
                return $row->user->LastName;
            })
            ->addColumn('price', function ($row) {
                return $row->sum . ' грн';
            })
            ->addColumn('quantity', function ($row) {
                $quantity = 0;
                foreach($row->products as $product){
                    $quantity += $product->quantity;
                }
                return $quantity;
            })
            ->addColumn('status', function ($row) {
                return Order::STASUSES[$row->user_order_status];
            })
            ->rawColumns(['action', 'price', 'quantity', 'last_name', 'first_name'])
            ->make(true);
    }

    public function changeOrderStatus(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);

        if(empty($order)){
            abort(404);
        }

        $order->user_order_status = $request->status;
        $order->update();

        return response()->json([
            'status' => true
        ], 200);
    }
}

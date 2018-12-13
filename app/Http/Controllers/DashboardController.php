<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        $products = Product::withCount('productOrders')
         ->orderBy('product_Orders_count', 'desc')
        ->get()->take(10);

        $orders = Order::orderBy('id','desc')->get()->take(10);

        $orders_count = Order::all()->count();
        $pending_orders = Order::where('processing',0)->count();
        $customers_count = User::all()->count();
        $orders_total = Order::all()->pluck('total')->sum();
        $shipping_total = Order::all()->pluck('shipping_fee')->sum();
        $sales = $orders_total - $shipping_total;

        return view('admin.dashboard',
            compact(
                'products',
                'orders',
                'orders_count',
                'customers_count',
                'sales',
                'pending_orders'

            ));
    }
}

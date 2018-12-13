<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Order;
use App\Address;
use App\OrderProductCount;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $orders = Order::all();
        $pending_orders = Order::where('processing',0)->count();
        $completed_orders = Order::where('delivered',1)->count();

        return view('admin.order.index',compact('orders','pending_orders','completed_orders'));
    }

  public function showOrder(Order $order){

       if($order->user_id == NULL){


           $subtotal = $order->total-$order->shipping_fee;

       }


       else{

           $user = User::where('id',$order->user_id)->first();

           $user_past_orders = Order::where('id','!=',$order->id)->where('user_id',$user->id)->get();

           $order_id = $user->orders()->pluck('id');

           $user_orders_products = OrderProductCount::whereIn('order_id',$order_id)->count();

           $subtotal = $order->total-$order->shipping_fee;
           $address = Address::where('user_id',$order->user_id)->where('default',1)->first();

       }



        return view('admin.order.show_order',compact('order','subtotal','address','user','user_orders_products','user_past_orders'));

  }
  public function completeOrder(Order $order,Request $request){


      $order->update($request->only('delivered'));

      return back()->withMessage('Order completed');


  }


  public function ConfirmPayment(Order $order,Request $request){


      $order->update($request->only('processing'));

      return back()->withMessage('Payment confirmed');

  }

}

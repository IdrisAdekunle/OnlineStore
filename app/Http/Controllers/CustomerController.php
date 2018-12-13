<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Address;
use Auth;

class CustomerController extends Controller
{


    public function AddWishList(Request $request, Product $product)
    {
        $request->user()->WishlistProducts()->syncWithoutDetaching([$product->id]);

        return back()->withMessage('Product added to wishlist');
    }

    public function RemoveWishList(Request $request, Product $product)

    {
        $request->user()->WishlistProducts()->detach($product);

        return back()->withMessage('Product added to wishlist');
    }


    public function Wishlists(Request $request)
    {
        $products = $request->user()->WishlistProducts()->paginate(4);

        return view('frontend.customer.wishlist', compact('products'));
    }


    public function accountIndex() {

        $user = Auth::user();

        return view ('frontend.customer.account',compact('user'));

    }

    public function CustomerOrders(){

        $user = Auth::user();
        $user_orders = Order::where('user_id',$user->id)->latest()->paginate(5);

        return view('frontend.customer.orders',compact('user_orders'));

    }

    public function ShowOrder(Order $order){

     $user = Auth::user();
        $subtotal = $order->total-$order->shipping_fee;
     $address = Address::where('user_id',$user->id)->where('default',1)->first();

       return view('frontend.customer.order_view',compact('order','subtotal','address'));

    }



}

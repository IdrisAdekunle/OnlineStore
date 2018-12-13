<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Order;
use App\Guest;

class CheckoutController extends Controller
{


    public function addressUser(Request $request)
    {

        $address = $request->user()->address()->where('default',1)->get();

        return view('frontend.checkout.address_user',compact('address'));

    }

    public function addressGuest(){

        return view('frontend.checkout.address_guest');

        }


    public function storeAddress(Request $request)
    {

        $request->session()->put('address', [

            'fname' => $request->fname,
            'lname' => $request->lname,
            'street' => $request->street,
            'state' => $request->state,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('checkout_delivery');

    }

    public function storeDelivery(Request $request)
    {

        $request->session()->put('delivery', [

            'name' => $request->delivery_name,
            'price' => $request->delivery_price

        ]);

        return redirect()->route('checkout_payment');

    }

    public function storePayment(Request $request)
    {

        $request->session()->put('payment', [

            'type' => $request->payment,
        ]);

        $cartItems = Cart::content();

        $convert = (string)Cart::total();

        $num = (int)str_replace(',','',$convert);
        $delivery = $request->session()->get('delivery');
        $shipping_fee = $delivery['price'];
        $total = $num + $delivery['price'];

        return view('frontend.checkout.order_review', compact('cartItems','shipping_fee','total'));


    }

    public function PlaceOrder(Request $request)
    {

        if (auth::check()) {



            $convert = (string)Cart::total();

            $num = (int)str_replace(',','',$convert);
            $user = auth::user();
            $delivery = $request->session()->get('delivery');
            $payment = $request->session()->get('payment');
            $total_price = $num + $delivery['price'];

            $order = new Order();

            $order->order_no = Order::GenerateOrderNo();
            $order->total = $total_price;
            $order->delivered = 0;
            $order->delivery_type = $delivery['name'];
            $order->payment_type = $payment['type'];
            $order->shipping_fee =  $delivery['price'];
            $order->user_id = $user->id;

            $order->save();


            $cartItems = Cart::content();


            foreach ($cartItems as $cartItem) {

                $order->OrderItems()->attach($cartItem->id, [

                    'qty' => $cartItem->qty,
                    'total' => $cartItem->qty * $cartItem->price,
                ]);


            }


        } else {

            $convert = (string)Cart::total();

            $num = (int)str_replace(',','',$convert);
            $delivery = $request->session()->get('delivery');
            $payment = $request->session()->get('payment');
            $address = $request->session()->get('address');
            $total_price = $num + $delivery['price'];
            $guest = new Guest();

            $guest->email = $address['email'];
            $guest->fname = $address['fname'];
            $guest->lname = $address['lname'];
            $guest->street = $address['street'];
            $guest->state = $address['state'];
            $guest->city = $address['city'];
            $guest->phone = $address['phone'];

            $guest->save();

            $guestId = $guest->id;

            $order = new Order();

                $order->order_no = Order::GenerateOrderNo();
                $order->total = $total_price;
                $order->delivered = 0;
                $order->delivery_type = $delivery['name'];
                $order->payment_type = $payment['type'];
               $order->shipping_fee =  $delivery['price'];
                $order->guest_id = $guestId;

            $order->save();

            $cartItems = Cart::content();


            foreach ($cartItems as $cartItem) {

                $order->OrderItems()->attach($cartItem->id, [

                    'qty' => $cartItem->qty,
                    'total' => $cartItem->qty * $cartItem->price,
                ]);
            }


        }

        $request->session()->forget(['cart','address','payment','delivery']);

        return redirect()->route('checkout_order_confirm');

    }
}


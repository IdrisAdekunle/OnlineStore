<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;

class CartController extends Controller
{

    public function AddToCart(Product $product, Request $request){

      // Cart::destroy();
      // return $request->all();
     $cart_item =  Cart::add($product->id, $product->name, 1, $product->price, ['size' => $request->size,'color' => $request->color]);

     Cart::associate($cart_item->rowId,'App\Product');

       return back();

    }


    public function Cart(){

        $cartItems = Cart::content();



        return view('frontend.cart',compact('cartItems'));
    }

    public function remove($product)
    {

      $remove =  Cart::content()->where('id',$product)->pluck('rowId')->toArray();

      $convert_string =implode($remove);


      Cart::remove($convert_string);

      return back();


    }

    public function update(Request $request,$rowId){


        Cart::update($rowId,$request->qty);

        return back();

    }

    public function destroy(){

        Cart::destroy();

        return back();

    }
}

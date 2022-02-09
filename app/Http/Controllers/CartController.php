<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $cart= Cart::add(['id' => $request->product_id,
                        'name' => $request->product_name,
                        'qty' => $request->quantity,
                        'price' => $request->product_price,
                        'weight' => 0,
                        'options' => [
                            'image' => $request->product_image
                            ]
                    ]);

    return redirect('/cart');
    }

    public function showCart(){
        $carts = Cart::content();
        $total = Cart::priceTotal();
        return view('public.cart.cart',compact('carts','total'));
    }

    public function removeCart($id){
        Cart::remove($id);

        return back();
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);

        return back();
    }
}

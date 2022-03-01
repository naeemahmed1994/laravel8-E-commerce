<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
        $cus = Session::get('customerId');
        // return $cus;
        if($cus){
            $customer = Customer::find($cus);
            $total = Cart::priceTotal();
            $carts = Cart::content();

            return view('public.checkout.checkout',compact('total','customer','carts'));
        }else{
            return view('public.signup-login.signup');
        }

    }

    public function orderAction(Request $request){
        // return $request->all();
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        $order = new Order();
        $order->order_no = $string;
        $order->customer_id = $request->customer_id;
        $order->grand_total = $request->grand_total;
        $order->payment_method = $request->payment_method;
        $order->delivery_type = "Cash On Delivery";
        $order->status = 1;
        $order->save();

        $carts = Cart::content();

        foreach($carts as $cart){
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cart->id;
            $orderDetail->price = $cart->price;
            $orderDetail->quantity = $cart->qty;
            $orderDetail->total = $cart->subtotal;
            $orderDetail->status = 1;
            $orderDetail->save();
        }

        $billing = new Billing();
        $billing->order_id = $order->id;
        $billing->billing_first_name = $request->billing_first_name;
        $billing->billing_last_name = $request->billing_last_name;
        $billing->billing_address_1 = $request->billing_address_1;
        $billing->billing_city = $request->billing_city;
        $billing->billing_postcode = $request->billing_postcode;
        $billing->billing_email = $request->billing_email;
        $billing->billing_phone = $request->billing_phone;
        $billing->save();


        if($request->shipping_first_name){
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->shipping_first_name = $request->shipping_first_name;
            $shipping->shipping_last_name = $request->shipping_last_name;
            $shipping->shipping_address_1 = $request->shipping_address_1;
            $shipping->shipping_city = $request->shipping_city;
            $shipping->shipping_postcode = $request->shipping_postcode;
            $shipping->billing_phone = $request->shipping_phone;
            $shipping->order_comments = $request->order_comments;
            $shipping->save();
        }

        Cart::destroy();


        return redirect('/order-success');

    }

    public function orderSuccess(){
        return view('public.checkout.order-success');
    }

}

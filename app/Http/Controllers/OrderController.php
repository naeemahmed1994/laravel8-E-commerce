<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('customer','orderDetails')->get();
        // dd($orders);
        return view('admin.order.index',compact('orders'));
    }

    public function orderDetails($id){
        $order = Order::with('customer','shipping','billing')->find($id);
        $orderDetails = OrderDetail::with('order.customer','product.brand','product.category')->where('order_id',$id)->get();
        // return $order;
        return view('admin.order.details',compact('orderDetails','order'));
    }

    public function orderStatus($id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        return back();

    }
}

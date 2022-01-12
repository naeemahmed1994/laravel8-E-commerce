<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home(){
        return view('public.home.index');
    }

    public function shop(){
        return view('public.shop.shop');
    }

    public function product(){
        return view('public.product.product');
    }

    public function chart(){
        return view('public.chart.chart');
    }

    public function checkout(){
        return view('public.checkout.checkout');
    }
}


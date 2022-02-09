<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home(){
        $sliders= Slider::where('status',1)->orderBy('id','DESC')->get();
        $brands= Brand::where('status',1)->get();
        $categories= Category::where('status',1)->get();
        $products= Product::with('productImage')->where('status',1)->orderBy('id','DESC')->get();

        return view('public.home.index',compact('sliders','brands','products','categories'));
    }

    public function shop(){
        $products= Product::with('productImage')->where('status',1)->orderBy('id','DESC')->get();
        return view('public.shop.shop',compact('products'));
    }

    public function product($id){
        $product = Product::with('productImage','category')->find($id);
        return view('public.product.product',compact('product'));
    }

    public function cart(){
        return view('public.cart.cart');
    }

    public function checkout(){
        return view('public.checkout.checkout');
    }

    public function brand($id){
        $brand = Brand::find($id);
        $products = Product::with('productImage')->where('status',1)->where('brand_id',$id)->orderBy('id','DESC')->get();
        return view('public.brand.brand',compact('products','brand'));
    }

    public function category($id){
        $category = Category::find($id);
        $products = Product::with('productImage')->where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        return view('public.category.category',compact('products','category'));
    }
}


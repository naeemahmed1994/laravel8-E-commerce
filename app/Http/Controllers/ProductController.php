<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $categories=Category::where('status','1')->get();
        $brands=Brand::where('status','1')->get();
        //return $categories;
        return view('admin.product.create',compact('categories','brands'));
    }

    public function createAction(Request $request){
        $product =new Product();
        $product->category_id= $request->category_id;
        $product->brand_id= $request->brand_id;
        $product->product_name= $request->product_name;
        $product->regular_price= $request->regular_price;
        $product->discount_price= $request->discount_price;
        $product->product_description= $request->product_description;
        $product->tags= $request->tags;
        $product->status= $request->status;
        $product->created_by= Auth::id();
        $product->save();

        return back()->with('message','Product Inserted Successfully');
    }
}

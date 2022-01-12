<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }
    public function create(){
        return view('admin.brand.create');
    }

    public function createAction(Request $request){

        $image=$request->file('image_path');

        $imageName=time().rand().'.'.$image->getClientOriginalExtension();
        $image-> move(public_path('admin/images/brand'),$imageName);
        $imagePath = 'admin/images/brand/'.$imageName;

        $brand =new Brand();

        $brand->image_path= $imagePath;
        $brand->brand_name= $request->brand_name;
        $brand->brand_description= $request->brand_description;
        $brand->status= $request->status;
        $brand->created_by= Auth::id();
        $brand->save();

        return back()->with('message','Brand Inserted Successfully');
    }

    public function edit($id){
        $data= Brand::find($id);
        return view('admin.brand.edit',compact('data'));
    }

    public function editAction(Request $request, $id){
        $brand= Brand::find($id);
        $image=$request->file('image_path');
        if($image){
            $imageName=time().rand().'.'.$image->getClientOriginalExtension();
            $image-> move(public_path('admin/images/brand'),$imageName);
            $imagePath = 'admin/images/brand/'.$imageName;

            $brand->image_path= $imagePath;
            $brand->brand_name= $request->brand_name;
            $brand->brand_description= $request->brand_description;
            $brand->status= $request->status;
            $brand->save();


        }else{
            $brand->brand_name=$request->brand_name;
            $brand->brand_description=$request->brand_description;
            $brand->status=$request->status;
            $brand->save();
        }
        return back()->with('message','Brand Updated Successfully');
    }

    public function delete($id){
        $brand= Brand::find($id);
        unlink($brand->image_path);
        $brand->delete();

        return back()->with('message','Brand Deleted Successfully');
    }


}

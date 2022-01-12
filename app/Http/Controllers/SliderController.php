<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;



class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }

    public function createAction(Request $request){
        // return $request->all();
        $image=$request->file('image_path');
        // dd($image);
        $imageName=time().rand().'.'.$image->getClientOriginalExtension();
        $image-> move(public_path('admin/images/slider'),$imageName);
        $imagePath = 'admin/images/slider/'.$imageName;
        // return $imagePath;
        $slider =new Slider;

        $slider->image_path= $imagePath;
        $slider->first_heading_text= $request->first_heading_text;
        $slider->second_heading_text= $request->second_heading_text;
        $slider->status= $request->status;
        $slider->created_by= Auth::id();
        $slider->save();

        return back()->with('message','Slider Inserted Successfully');
    }

    public function edit($id){
        $data= Slider::find($id);
        return view('admin.slider.edit',compact('data'));
    }

    public function editAction(Request $request, $id){
        $slider= Slider::find($id);
        $image=$request->file('image_path');
        if($image){
            unlink($slider->image_path);
            $imageName=time().rand().'.'.$image->getClientOriginalExtension();
            $image-> move(public_path('admin/images/slider'),$imageName);
            $imagePath = 'admin/images/slider/'.$imageName;

            $slider->image_path= $imagePath;
            $slider->first_heading_text= $request->first_heading_text;
            $slider->second_heading_text= $request->second_heading_text;
            $slider->status= $request->status;
            $slider->save();

        }else{
            $slider->first_heading_text= $request->first_heading_text;
            $slider->second_heading_text= $request->second_heading_text;
            $slider->status= $request->status;
            $slider->save();

        }
        return back()->with('message','Slider Updated Successfully');

    }
    public function delete($id){

        $slider= Slider::find($id);
        unlink($slider->image_path);
        $slider->delete();

        return back()->with('message','Slider Deleted Successfully');
    }
}

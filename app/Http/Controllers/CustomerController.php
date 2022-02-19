<?php

namespace App\Http\Controllers;

use App\Models\Customer;
// use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function signup(){
        return view('public.signup-login.signup');
    }

    public function signupAction(Request $request){
        //return $request->all();
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->user_name = $request->user_name;
        $customer->email_address = $request->email_address;
        $customer->address = $request->address;
        $customer->mobile_no = $request->mobile_no;
        $customer->password = bcrypt($request->password);
        $customer->dob = $request->dob;
        $customer->gender = $request->gender;
        $customer->save();

        Session::put('customerId',$customer->id);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        return redirect('/');
    }

    public function login(){
        return view('public.signup-login.login');
    }

    public function loginAction(Request $request){
        $customer = Customer::where('email_address',$request->email_address)->first();

        if(password_verify($request->password,$customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);
            return redirect('/');
        }else{
            return back();
        }
    }

    public function logout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return back();
    }
}

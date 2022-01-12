<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactController extends Controller
{
   public function index(){
    //    $contacts = Contact::all();
    $contacts=DB::table('contacts')->get();

       return view('public.contact.index',compact('contacts'));
   }

   public function createContact(Request $request){
    //    return $request->all();
    // Contact::create($request->all());
    $contact=new Contact;
    $contact->name=$request->name;
    $contact->email=$request->email;
    $contact->phone=$request->phone;
    $contact->message=$request->message;
    $contact->save();

    // DB::table('contacts')->insert([
    //     'name'=>$request->name,
    //     'email'=>$request->email,
    //     'phone'=>$request->phone,
    //     'message'=>$request->message,
    //     'created_at'=>Carbon::now()
    // ]);

    return back();
   }
}

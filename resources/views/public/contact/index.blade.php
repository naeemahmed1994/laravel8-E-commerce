@extends('public.master')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 md-auto">
            <form action="{{url('create-contact')}}" method="post">
                @csrf
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name">
                    
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email">
                    
                </div>
                <div class="form-group">
                    <label >Phone Number</label>
                    <input type="text" class="form-control" placeholder="Enter phone" name="phone">
                    
                </div>
                <div class="form-group">
                    <label >Message</label>
                    <textarea  class="form-control" placeholder="Enter message" name="message"></textarea>
                    
                </div>
                
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>SI.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->message}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
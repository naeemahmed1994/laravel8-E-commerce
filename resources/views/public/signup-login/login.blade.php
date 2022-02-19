@extends('public.master')

@section('body')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <!-- <div class="woocommerce-info">Returning customer? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                            </div> -->

                            <form id="login-form-wrap" action="{{url('/customer-login')}}" class="login" method="post">
                                @csrf

                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                                <p class="form-row form-row-first">
                                    <label >Email Address</label>
                                    <input type="text" id="username" name="email_address" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Password <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                </p>
                                

                                <div class="clear"></div>
                            </form>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection

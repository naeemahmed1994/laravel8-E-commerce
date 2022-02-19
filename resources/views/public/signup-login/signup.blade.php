@extends('public.master')

@section('body')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sign Up</h2>
                    </div>
                    <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <!-- <div class="woocommerce-info">Returning customer? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                            </div> -->

                            <form action="{{url('/customer-sign-up')}}" id="login-form-wrap" class="login" method="post">
                                @csrf

                                <!-- <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p> -->
                                <p  class="form-row form-row-first validate-required">
                                                <label >First Name</label>
                                                <input type="text"  placeholder=""  name="first_name" class="input-text ">
                                            </p>

                                            <p class="form-row form-row-last validate-required">
                                                <label >Last Name </label>
                                                <input type="text" placeholder=""  name="last_name" class="input-text ">
                                </p>
                                <p class="form-row form-row-first">
                                    <label >Username</label>
                                    <input type="text" id="username" name="user_name" class="input-text">
                                </p>
                                <p class="form-row form-row-first validate-required validate-email">
                                <label>Email Address </label>
                                <input type="text" placeholder=""  name="email_address" class="input-text ">
                                </p>
                                <p class="form-row form-row-wide address-field validate-required">
                                                <label>Address</label>
                                                <textarea  placeholder="Street address"  name="address" class="input-text "></textarea>
                                </p>

                                <p class="form-row form-row-last validate-required validate-phone">
                                    <label>Phone </label>
                                    <input type="text"  placeholder="" id="mobile_no" name="mobile_no" class="input-text ">
                                </p>

                                <p class="form-row form-row-last">
                                    <label for="password">Password </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <p class="form-row form-row-last validate-required validate-phone">
                                    <label >Date of Birth</label>
                                    <input type="date" name="dob" class="input-text ">
                                </p>
                                <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                    <label class="" for="billing_phone">Gender <abbr title="required" class="required">*</abbr></label>
                                    <input type="radio"  name="gender" class="input-text " value="1">Male
                                    <input type="radio"  name="gender" class="input-text " value="2">Female
                                    <input type="radio"  name="gender" class="input-text " value="0">Others
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Sign Up" name="login" class="button">
                                </p>


                                <div class="clear"></div>
                            </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('public.master')

@section('body')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form action="{{url('/update-cart')}}" method="post">
                                            @csrf
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($carts as $cart)

                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{url('/remove-cart/'.$cart->rowId)}}">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{asset($cart->options->image)}}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{url('/product/'.$cart->id.'/'.$cart->name)}}">{{$cart->name}}</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">Tk. {{$cart->price}} /=</span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-">
                                                    <input type="number" size="4" class="input-text qty text" name="qty" value="{{$cart->qty}}" min="0" step="1">
                                                    <input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                                    <input type="button" class="plus" value="+">
                                                </div>


                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">Tk. {{$cart->price * $cart->qty}}</span>
                                            </td>
                                        </tr>

                                        @endforeach

                                        <tr>
                                            <td class="actions" colspan="6">
                                                <!-- <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div> -->
                                                <input type="submit" value="Update Cart" name="update_cart" class="button">
                                                <a href="{{url('/checkout')}}" class="btn btn-info">Checkout</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">

                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Tk. {{$total}}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">Tk. {{$total}}</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

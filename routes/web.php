<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Models\Brand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[TestController::class,'home']);
Route::get('/shop',[TestController::class,'shop']);
Route::get('/product/{id}/{name}',[TestController::class,'product']);
Route::get('/cart',[TestController::class,'cart']);
//Route::get('/checkout',[TestController::class,'checkout']);
Route::get('/brand/{id}',[TestController::class,'brand']);
Route::get('/category/{id}',[TestController::class,'category']);

//Cart

Route::post('/add-to-cart',[CartController::class,'addToCart']);
Route::get('/cart',[CartController::class,'showCart']);
Route::get('/remove-cart/{id}',[CartController::class,'removeCart']);
Route::post('/update-cart',[CartController::class,'updateCart']);

//Checkout
Route::get('/checkout',[CheckoutController::class,'index']);
Route::post('/order-post',[CheckoutController::class,'orderAction'])->name('order-post');
Route::get('/order-success',[CheckoutController::class,'orderSuccess']);

//sign-up
Route::get('/customer-sign-up',[CustomerController::class,'signup']);
Route::post('/customer-sign-up',[CustomerController::class,'signupAction']);


//login
Route::get('/customer-login',[CustomerController::class,'login']);
Route::post('/customer-login',[CustomerController::class,'loginAction']);

//logout

Route::get('/logout',[CustomerController::class,'logout']);


//for contact in contactcontroller
Route::get('/contact',[ContactController::class,'index']);
Route::post('/create-contact',[ContactController::class,'createContact']);

Route::get('/dashboard', function () {
    return view('admin.home.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// slider

Route::get('/slider',[SliderController::class,'index']);
Route::get('/create-slider',[SliderController::class,'create']);
Route::post('/create-slider',[SliderController::class,'createAction']);
Route::get('/edit-slider/{id}',[SliderController::class,'edit']);
Route::post('/edit-slider/{id}',[SliderController::class,'editAction']);
Route::get('/delete-slider/{id}',[SliderController::class,'delete']);

//Category

Route::get('/categories',[CategoryController::class,'index']);
Route::get('/create-categories',[CategoryController::class,'create']);
Route::post('/create-categories',[CategoryController::class,'createAction']);
Route::get('/edit-categories/{id}',[CategoryController::class,'edit']);
Route::post('/edit-categories/{id}',[CategoryController::class,'editAction']);
Route::get('/delete-categories/{id}',[CategoryController::class,'delete']);

// brand

Route::get('/brands',[BrandController::class,'index']);
Route::get('/create-brands',[BrandController::class,'create']);
Route::post('/create-brands',[BrandController::class,'createAction']);
Route::get('/edit-brands/{id}',[BrandController::class,'edit']);
Route::post('/edit-brands/{id}',[BrandController::class,'editAction']);
Route::get('/delete-brands/{id}',[BrandController::class,'delete']);

// product

Route::get('/products',[ProductController::class,'index']);
Route::get('/create-products',[ProductController::class,'create']);
Route::post('/create-products',[ProductController::class,'createAction']);
Route::get('/product/{id}',[ProductController::class,'detail']);



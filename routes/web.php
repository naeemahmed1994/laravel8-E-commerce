<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
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
Route::get('/product',[TestController::class,'product']);
Route::get('/chart',[TestController::class,'chart']);
Route::get('/checkout',[TestController::class,'checkout']);
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



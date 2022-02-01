<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('index',['title'=>'Welcome Page']);
});


Route::get('/admin',function(){
    return view('adminHomePage',['title'=>'Admin Page']);
});


Route::get('/farmer',function(){
    return view('farmerHomePage',['title'=>'Farmer Page']);
});


Route::get('/user',function(){
    return view('userHomePage',['title'=>'User Page']);
});




//auth routes

Route::get('/auth/signup',[UserController::class,'create']);

Route::post('/auth/signup',[UserController::class,'store']);

Route::get('/auth/signin',[UserController::class,'login']);

Route::post('/auth/signin',[UserController::class,'check']);


//product routes

Route::get("/products",[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'show']);

Route::get('/admin/create-product',[ProductController::class,'create']);

Route::post('/admin/create-product',[ProductController::class,'store']);


//auction routes

Route::get('/user/auctions',[AuctionController::class,'index']);

Route::get('/user/auction/{id}',[AuctionController::class,'show']);

Route::get('/farmer/create-auction',[AuctionController::class,'create']);

Route::post('/farmer/create-auction',[AuctionController::class,'store']);



//item routes

Route::get('/farmer/create-item',[ItemController::class,'create']);

Route::post('/farmer/create-item',[ItemController::class,'store']);

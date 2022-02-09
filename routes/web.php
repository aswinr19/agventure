<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuctionController;

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

Route::get("/admin/products",[ProductController::class,'index']);

Route::get('/admin/product/{id}',[ProductController::class,'show']);

Route::get('/admin/create-product',[ProductController::class,'create']);

Route::post('/admin/create-product',[ProductController::class,'store']);

Route::get('/admin/update-product/{id}',[ProductController::class,'update']);

Route::post('/admin/update-product',[ProductController::class,'change']);

Route::get('/admin/delete-product/{id}',[ProductController::class,'destroy']);



//auction routes

Route::get('/farmer/auctions',[AuctionController::class,'index']);

Route::get('/farmer/auction/{id}',[AuctionController::class,'show']);

Route::get('/farmer/create-auction',[AuctionController::class,'create']);

Route::post('/farmer/create-auction',[AuctionController::class,'store']);

Route::get('/farmer/update-auction/{id}',[AuctionController::class,'update']);

Route::post('/farmer/update-auction',[AuctionController::class,'change']);

Route::get('farmer/delete-auction',[AuctionController::class,'destroy']);



//item routes

Route::get('/farmer/create-item',[ItemController::class,'create']);

Route::post('/farmer/create-item',[ItemController::class,'store']);

Route::get('/farmer/items',[ItemController::class,'index']);

Route::get('/farmer/item/{id}',[ItemController::class,'show']);

Route::get('/farmer/update-item/{id}',[ItemController::class,'update']);

Route::post('/farmer/update-item',[ItemController::class,'change']);

Route::get('/farmer/delete-item/{id}',[ItemController::class,'destroy']);



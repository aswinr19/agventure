<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\GuidelineController;




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


//item routes

Route::get('/farmer/items',[ItemController::class,'index']);

Route::get('/farmer/item/{id}',[ItemController::class,'show']);

Route::get('/farmer/create-item',[ItemController::class,'create']);

Route::post('/farmer/create-item',[ItemController::class,'store']);

Route::get('/farmer/update-item/{id}',[ItemController::class,'update']);

Route::post('/farmer/update-item',[ItemController::class,'change']);

Route::get('/farmer/delete-item/{id}',[ItemController::class,'destroy']);



//auction routes

Route::get('/farmer/auctions',[AuctionController::class,'index']);

Route::get('/farmer/auction/{id}',[AuctionController::class,'show']);

Route::get('/farmer/create-auction',[AuctionController::class,'create']);

Route::post('/farmer/create-auction',[AuctionController::class,'store']);

Route::get('/farmer/update-auction/{id}',[AuctionController::class,'update']);

Route::post('/farmer/update-auction',[AuctionController::class,'change']);

Route::get('farmer/delete-auction/{id}',[AuctionController::class,'destroy']);


//complaint routes

Route::get('/user/complaints',[ComplaintController::class,'index']);

Route::get('/user/complaint/{id}',[ComplaintController::class,'show']);

Route::get('/user/create-complaint',[ComplaintController::class,'create']);

Route::post('/user/create-complaint',[ComplaintController::class,'store']);

Route::get('/user/update-complaint/{id}',[ComplaintController::class,'update']);

Route::get('/user/update-complaint',[ComplaintController::class,'change']);

Route::get('/user/delete-complaint/{id}',[ComplaintController::class,'destroy']);


//guideline routes

Route::get('/admin/guidelines',[GuidelineController::class,'index']);

Route::get('/admin/guideline/{id}',[GuidelineController::class,'show']);

Route::get('/admin/create-guideline',[GuidelineController::class,'create']);

Route::post('/admin/create-guideline',[GuidelineController::class,'store']);

Route::get('/admin/update-guideline/{id}',[GuidelineController::class,'update']);

Route::post('/admin/update-guideline',[GuidelineController::class,'change']);

Route::get('/admin/delete-guideline',[GuidelineController::class,'destroy']);













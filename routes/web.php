<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/auth/signup',[UserController::class,'create']);

Route::post('/auth/signup',[UserController::class,'store']);

Route::get('/auth/signin',[UserController::class,'login']);

Route::post('/auth/signin',[UserController::class,'check']);


Route::get("/products",[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'show']);

Route::get('/admin/create-product',[ProductController::class,'create']);

Route::post('/admin/create-product',[ProductController::class,'store']);

Route::get('/user/auctions',function(){
        return view('auctions',['title'=>'Auctions page']);
});


Route::get('/user/auction/{id}',function($id){
    return view('auction',['title'=>'Auction page']);
});

Route::get('/farmer/create-item',function(){
        return view('createItem',['title'=>'Create item page']);
});

Route::post('/farmer/create-item',function(Request $request){

});


Route::get('/farmer/create-auction',function(){
    return view('createAuction',['title'=>'Create auction page']);
});


Route::post('/farmer/create-auction',function(Request $request){
    
});
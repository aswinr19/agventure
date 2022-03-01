<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\GuidelineController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TipController;





Route::get('/', function () {
    return view('index',['title'=>'Welcome Page']);
});


Route::get('/admin',function(){
    return view('adminHomePage',['title'=>'Admin Page']);
});


Route::get('/farmer',function(){
    return view('farmerHomePage',['title'=>'Farmer Page']);
});


//common routes


Route::get('/products',[ProductController::class,'display']);

Route::get('/product/{id}',[ProductController::class,'displayOne']);

Route::get('/auctions',[AuctionController::class,'display']);

Route::get('/auction/{id}',[AuctionController::class,'displayOne']);

Route::get('/machines',[MachineController::class,'display']);

Route::get('/machine/{id}',[MachineController::class,'displayOne']);

Route::get('/checkout',[PurchaseController::class,'create']);

Route::post('/checkout',[PurchaseController::class,'store']);

Route::post('/checkout/create-address',[AddressController::class,'store']);

Route::post('/checkout/update-address',[AddressController::class,'change']);

Route::get('/checkout/delete-address',[AddressController::class,'destroy']);

Route::post('/checkout/create-payment-details',[PaymentController::class,'store']);

Route::post('/checkout/update-payment-details',[PaymentController::class,'change']);

Route::get('/checkout/delete-payment-details',[PaymentController::class,'destroy']);

Route::get('/profile/{id}',[UserController::class,'show']);

Route::post('/profile/update-profile',[UserController::class,'change']);

Route::get('/profile/delete-profile',[UserController::class,'destroy']);

Route::get('/cart',[CartController::class,'index']);

Route::post('/add-to-cart',[CartController::class,'store']);

Route::get('cart/delete-cart-item/{id}',[CartController::class,'destroy']);

Route::get('/cart/increment-cart-item-count/{id}',[CartController::class,'increment']);

Route::get('/cart/decrement-cart-item-count/{id}',[CartController::class,'decrement']);



//auth routes

Route::get('/auth/signup',[UserController::class,'create']);

Route::post('/auth/signup',[UserController::class,'store']);

Route::get('/auth/signin',[UserController::class,'login']);

Route::post('/auth/signin',[UserController::class,'check']);

Route::get('auth/logout',[UserController::class,'logout']);


//specific routes 

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


//machine routes

Route::get('/admin/machines',[MachineController::class,'index']);

Route::get('/admin/machine/{id}',[MachineController::class,'show']);

Route::get('/admin/create-machine',[MachineController::class,'create']);

Route::post('/admin/create-machine',[MachineController::class,'store']);

Route::get('/admin/update-machine/{id}',[MachineController::class,'update']);

Route::post('/admin/update-machine',[MachineController::class,'change']);

Route::get('/admin/delete-machine/{id}',[MachineController::class,'destroy']);


//tips

Route::get('/admin/tips',[TipController::class,'index']);

Route::get('/admin/tip/{id}',[TipController::class,'show']);

Route::get('/admin/create-tip',[TipController::class,'create']);

Route::Post('/admin/create-tip',[TipController::class,'store']);

Route::get('/admin/update-tip/{id}',[TipController::class,'update']);

Route::post('/admin/update-tip',[TipController::class,'change']);

Route::get('/admin/delete-tip',[TipController::class,'destroy']);


//users

Route::get('/admin/user-profiles',[UserController::class,'index']);




//TODO

//create user pages for auction , products , machines.
//add many to many realtion to machines and purchases.
//add cart functionalities and logic to extract products id and machines id from cart. 
//add auction ending with change in status , when the time ends , etc.
//add search functionality to products and machines page (for users).
//add the rest of the relations.
//add functionality to increase and decrease the count of the cart items.
//add query to find the specific products, items of the the admin who added the product,item (currently using if to check that in view ).
//add middlewares to check for authentication ,authorization(roles) ,and protect routes.
//add functionality for rating prodcuts.
//add stripe payments
//add styling elemnts to views.
//test the code for errors ,bugs.
//address the n-1 problem.
//add coupon code functionality.
//add a product recommendation engine.
//add a task schedular to check update the remaining time fo acution 

//BUGS

//bug in creating auctions - create() method , returns the last added item for creating auction , there isn't any check for the owner of the item.
//crct the mistakes with showing individual results pages.
//bug in deleting products , auctions , items etc .No check for owner!

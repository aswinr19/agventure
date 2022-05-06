<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\GuidelineController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SoilTestController;
use App\Http\Controllers\TipController;



Route::get('/', function () {

        return view('index',['title'=>'Welcome Page']);   
});


Route::get('/admin',function(){
    return view('adminHomePage',['title'=>'Admin Page']);
})
->middleware('isAdmin');


Route::get('/farmer',function(){
    return view('farmerHomePage',['title'=>'Farmer Page']);
})
->middleware('isFarmer');


//common routes


Route::get('/products',[ProductController::class,'display']);

Route::get('/product/{id}',[ProductController::class,'displayOne']);

Route::get('/auctions',[AuctionController::class,'display'])->middleware('isLoggedIn');

Route::get('/auction/{id}',[AuctionController::class,'displayOne'])->middleware('isLoggedIn');

Route::post('/auctions/new-bid',[AuctionController::class,'startBid'])->middleware('isLoggedIn');

Route::post('/auction/update-bid',[AuctionController::class,'updateBid'])->middleware('isLoggedIn');

Route::get('/machines',[MachineController::class,'display']);

Route::get('/machine/{id}',[MachineController::class,'displayOne']);

Route::get('/checkout',[PurchaseController::class,'create'])->middleware('isLoggedIn');

Route::post('/checkout',[PurchaseController::class,'makeTransaction'])->middleware('isLoggedIn');

Route::get('/checkout/success',[PurchaseController::class,'success']);

Route::get('/checkout/failed',[PurchaseController::class,'failed']);

Route::post('/checkout/create-address',[AddressController::class,'store'])->middleware('isLoggedIn');

Route::post('/checkout/update-address/{id}',[AddressController::class,'change'])->middleware('isLoggedIn');

Route::get('/checkout/delete-address/{id}',[AddressController::class,'destroy'])->middleware('isLoggedIn');

// Route::post('/checkout/create-payment-details',[PaymentController::class,'store']);

// Route::post('/checkout/update-payment-details',[PaymentController::class,'change']);

// Route::get('/delete-payment-details',[PaymentController::class,'destroy'])->middleware('isLoggedIn');

Route::get('/orders',[OrderController::class,'display'])->middleware('isLoggedIn');

Route::get('/orders/{id}',[OrderController::class,'displayOne'])->middleware('isLoggedIn');

Route::get('/orders/cancel-order/{id}',[OrderController::class,'cancel'])->middleware('isLoggedIn');

Route::get('/profile',[UserController::class,'show'])->middleware('isLoggedIn');

Route::post('/profile/update-profile',[UserController::class,'change'])->middleware('isLoggedIn');

Route::get('/profile/delete-profile',[UserController::class,'destroy'])->middleware('isLoggedIn');

Route::get('/cart',[CartController::class,'index'])->middleware('isLoggedIn');

Route::post('/add-to-cart',[CartController::class,'store'])->middleware('isLoggedIn');

Route::get('cart/delete-cart-item/{id}',[CartController::class,'destroy'])->middleware('isLoggedIn');

Route::get('/cart/increment-cart-item-count/{id}',[CartController::class,'increment'])->middleware('isLoggedIn');

Route::get('/cart/decrement-cart-item-count/{id}',[CartController::class,'decrement'])->middleware('isLoggedIn');

Route::post('/cart/proceed-to-buy',[CartController::class,'prodceedToBuy']);

Route::get('/tips',[TipController::class,'display']);

Route::get('/guidelines',[GuidelineController::class,'display']);

Route::get('/guideline/{id}',[GuidelineController::class,'displayOne']);

Route::get('/experts',[ExpertController::class,'display'])->middleware('isLoggedIn');

Route::get('/expert/{id}',[ExpertController::class,'displayOne'])->middleware('isLoggedIn');

Route::post('/expert/book-appointment',[AppointmentController::class,'store'])->middleware('isLoggedIn');

Route::get('/expert/cancel-appointment',[AppointmentController::class,'destroy'])->middleware('isLoggedIn');

Route::get('/appointments',[AppointmentController::class,'index'])->middleware('isLoggedIn');

Route::get('/soil-test/appointments',[SoilTestController::class,'display'])->middleware('isLoggedIn');

Route::get('/soil-test/appointments/{id}',[SoilTestController::class,'displayOne'])->middleware('isLoggedIn');

Route::get('/soil-test/create-soil-test',[SoilTestController::class,'create'])->middleware('isLoggedIn');

Route::post('/soil-test/create-soil-test',[SoilTestController::class,'store'])->middleware('isLoggedIn');

Route::get('/soil-test/update-soil-test/{id}',[SoilTestController::class,'update'])->middleware('isLoggedIn');

Route::post('/soil-test/update-soil-test',[SoilTestController::class,'change'])->middleware('isLoggedIn');

Route::get('/weather');

Route::post('/weather');


//auth routes

Route::get('/auth/signup',[UserController::class,'create'])->middleware('isNotLoggedIn');

Route::post('/auth/signup',[UserController::class,'store'])->middleware('isNotLoggedIn');

Route::get('/auth/signin',[UserController::class,'login'])->middleware('isNotLoggedIn');

Route::post('/auth/signin',[UserController::class,'check'])->middleware('isNotLoggedIn');

Route::get('auth/logout',[UserController::class,'logout'])->middleware('isLoggedIn');


//specific routes 

//soil tests

Route::get('/admin/soil-test/appointments',[SoilTestController::class,'index'])->middleware('isAdmin');

Route::get('/admin/soil-test/appointments/{id}',[SoilTestController::class,'show'])->middleware('isAdmin');


//category routes

Route::get('/admin/categories',[CategoryController::class,'index'])->middleware('isAdmin');

Route::get('/admin/create-category',[CategoryController::class,'create'])->middleware('isAdmin');

Route::post('/admin/create-category',[CategoryController::class,'store'])->middleware('isAdmin');

Route::get('/admin/update-category/{id}',[CategoryController::class,'update'])->middleware('isAdmin');

Route::post('/admin/update-category',[CategoryController::class,'change'])->middleware('isAdmin');

Route::get('/admin/delete-category/{id}',[CategoryController::class,'destroy'])->middleware('isAdmin');


//product routes

Route::get('/admin/products',[ProductController::class,'index'])->middleware('isAdmin');

Route::get('/admin/product/{id}',[ProductController::class,'show'])->middleware('isAdmin');

Route::get('/admin/create-product',[ProductController::class,'create'])->middleware('isAdmin');

Route::post('/admin/create-product',[ProductController::class,'store'])->middleware('isAdmin');

Route::get('/admin/update-product/{id}',[ProductController::class,'update'])->middleware('isAdmin');

Route::post('/admin/update-product',[ProductController::class,'change'])->middleware('isAdmin');

Route::get('/admin/delete-product/{id}',[ProductController::class,'destroy'])->middleware('isAdmin');

//order routes

Route::get('/admin/orders',[OrderController::class,'index'])->middleware('isAdmin');

Route::get('/admin/orders/{id}',[OrderController::class,'show'])->middleware('isAdmin');

Route::get('/admin/orders/update/packed/{id}',[OrderController::class,'packed'])->middleware('isAdmin');

Route::get('/admin/orders/update/shipped/{id}',[OrderController::class,'shipped'])->middleware('isAdmin');

Route::get('/admin/orders/update/delivered/{id}',[OrderController::class,'delivered'])->middleware('isAdmin');

//item routes

Route::get('/farmer/items',[ItemController::class,'index'])->middleware('isFarmer');

Route::get('/farmer/item/{id}',[ItemController::class,'show'])->middleware('isFarmer');

Route::get('/farmer/create-item',[ItemController::class,'create'])->middleware('isFarmer');

Route::post('/farmer/create-item',[ItemController::class,'store'])->middleware('isFarmer');

Route::get('/farmer/update-item/{id}',[ItemController::class,'update'])->middleware('isFarmer');

Route::post('/farmer/update-item',[ItemController::class,'change'])->middleware('isFarmer');

Route::get('/farmer/delete-item/{id}',[ItemController::class,'destroy'])->middleware('isFarmer');



//auction routes

Route::get('/farmer/auctions',[AuctionController::class,'index'])->middleware('isFarmer');

Route::get('/farmer/auction/{id}',[AuctionController::class,'show'])->middleware('isFarmer');

Route::get('/farmer/create-auction',[AuctionController::class,'create'])->middleware('isFarmer');

Route::post('/farmer/create-auction',[AuctionController::class,'store'])->middleware('isFarmer');

Route::get('/farmer/update-auction/{id}',[AuctionController::class,'update'])->middleware('isFarmer');

Route::post('/farmer/update-auction',[AuctionController::class,'change'])->middleware('isFarmer');

Route::get('farmer/delete-auction/{id}',[AuctionController::class,'destroy'])->middleware('isFarmer');

Route::get('/admin/auctions',[AuctionController::class,'indexAdmin'])->middleware('isAdmin');

Route::get('/admin/auction/{id}',[AuctionController::class,'showAdmin'])->middleware('isAdmin');

Route::get('/admin/auction/approve/{id}',[AuctionController::class,'approve'])->middleware('isAdmin');

Route::get('/admin/auction/reject/{id}',[AuctionController::class,'reject'])->middleware('isAdmin');


//complaint routes

Route::get('/user/complaints',[ComplaintController::class,'index'])->middleware('isUser');

Route::get('/user/complaint/{id}',[ComplaintController::class,'show'])->middleware('isUser');

Route::get('/user/create-complaint',[ComplaintController::class,'create'])->middleware('isUser');

Route::post('/user/create-complaint',[ComplaintController::class,'store'])->middleware('isUser');

Route::get('/user/update-complaint/{id}',[ComplaintController::class,'update'])->middleware('isUser');

Route::get('/user/update-complaint',[ComplaintController::class,'change'])->middleware('isUser');

Route::get('/user/delete-complaint/{id}',[ComplaintController::class,'destroy'])->middleware('isUser');


//guideline routes

Route::get('/admin/guidelines',[GuidelineController::class,'index'])->middleware('isAdmin');

Route::get('/admin/guideline/{id}',[GuidelineController::class,'show'])->middleware('isAdmin');

Route::get('/admin/create-guideline',[GuidelineController::class,'create'])->middleware('isAdmin');

Route::post('/admin/create-guideline',[GuidelineController::class,'store'])->middleware('isAdmin');

Route::get('/admin/update-guideline/{id}',[GuidelineController::class,'update'])->middleware('isAdmin');

Route::post('/admin/update-guideline',[GuidelineController::class,'change'])->middleware('isAdmin');

Route::get('/admin/delete-guideline',[GuidelineController::class,'destroy'])->middleware('isAdmin');

//machine routes

Route::get('/admin/machines',[MachineController::class,'index']);

Route::get('/admin/machine/{id}',[MachineController::class,'show']);

Route::get('/admin/create-machine',[MachineController::class,'create'])->middleware('isAdmin');

Route::post('/admin/create-machine',[MachineController::class,'store'])->middleware('isAdmin');

Route::get('/admin/update-machine/{id}',[MachineController::class,'update'])->middleware('isAdmin');

Route::post('/admin/update-machine',[MachineController::class,'change'])->middleware('isAdmin');

Route::get('/admin/delete-machine/{id}',[MachineController::class,'destroy'])->middleware('isAdmin');


//tips

Route::get('/admin/tips',[TipController::class,'index'])->middleware('isAdmin');

 Route::get('/admin/tip/{id}',[TipController::class,'show'])->middleware('isAdmin');

Route::get('/admin/create-tip',[TipController::class,'create'])->middleware('isAdmin');

Route::Post('/admin/create-tip',[TipController::class,'store'])->middleware('isAdmin');

Route::get('/admin/update-tip/{id}',[TipController::class,'update'])->middleware('isAdmin');

Route::post('/admin/update-tip',[TipController::class,'change'])->middleware('isAdmin');

Route::get('/admin/delete-tip',[TipController::class,'destroy'])->middleware('isAdmin');


//exxperts

Route::get('/admin/experts',[ExpertController::class,'index'])->middleware('isAdmin');

Route::get('/admin/experts/{id}',[ExpertController::class,'show'])->middleware('isAdmin');

Route::get('/admin/create-expert',[ExpertController::class,'create'])->middleware('isAdmin');

Route::post('/admin/create-expert',[ExpertController::class,'store'])->middleware('isAdmin');

Route::get('/admin/update-expert',[ExpertController::class,'update'])->middleware('isAdmin');

Route::post('/admin/update-expert',[ExpertController::class,'change'])->middleware('isAdmin');

Route::get('/admin/delere-expert',[ExpertController::class,'destroy'])->middleware('isAdmin');


//users

Route::get('/admin/user-profiles',[UserController::class,'index'])->middleware('isAdmin');




//TODO
//soil test page - create html calender controll to select date and time and controller actions
// add cascade on delete for necessary relations.
//add styling elements to views.
    //show rejected auctions as dull in farmer view (auctions.index)
//test the code for errors ,bugs.
//address the n-1 problem.
//add functionality for rating prodcuts.
//add coupon code functionality.
//add a product recommendation engine.



//BUGS
//bug in creating auctions - create() method , returns the last added item for creating auction , there isn't any check for the owner of the item.



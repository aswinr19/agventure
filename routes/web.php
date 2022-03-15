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
use App\Http\Controllers\CategoryController;
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

Route::get('/profile',[UserController::class,'show'])->middleware('customAuth');

Route::post('/profile/update-profile',[UserController::class,'change']);

Route::get('/profile/delete-profile',[UserController::class,'destroy']);

Route::get('/cart',[CartController::class,'index'])->middleware('isUser');

Route::post('/add-to-cart',[CartController::class,'store'])->middleware('isUser');

Route::get('cart/delete-cart-item/{id}',[CartController::class,'destroy'])->middleware('isUser');

Route::get('/cart/increment-cart-item-count/{id}',[CartController::class,'increment'])->middleware('isUser');

Route::get('/cart/decrement-cart-item-count/{id}',[CartController::class,'decrement'])->middleware('isUser');



//auth routes

Route::get('/auth/signup',[UserController::class,'create']);

Route::post('/auth/signup',[UserController::class,'store']);

Route::get('/auth/signin',[UserController::class,'login']);

Route::post('/auth/signin',[UserController::class,'check']);

Route::get('auth/logout',[UserController::class,'logout'])->middleware('customAuth');


//specific routes 

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

Route::post('/admin/auction/approve/{id}',[AuctionController::class,'approve'])->middleware('isAdmin');

Route::post('/admin/auction/reject/{id}',[AuctionController::class,'reject'])->middleware('isAdmin');


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

Route::get('/admin/machines',[MachineController::class,'index'])->middleware('isAdmin');

Route::get('/admin/machine/{id}',[MachineController::class,'show'])->middleware('isAdmin');

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


//users

Route::get('/admin/user-profiles',[UserController::class,'index'])->middleware('isAdmin');




//TODO

// add a user page for guidelines and tips
//add many to many realtion to machines and purchases.
//add cart functionalities and logic to extract products id and machines id from cart. 
//add the rest of the relations.
//add middlewares to check for authentication ,authorization(roles) ,and protect routes.
//add a field in auction table to specify the ending time of the auction and schedule a task to check for the curren time and auction ending time
    //if ending time exceeded the current time then update the auction status to ended ( add logic to calculate the ending time in the admin approve action ).
//add a task schedular to check update the remaining time fo acution.
// add cascade on delete for necessary relations.
//add stripe payments
//add styling elemnts to views.
    //show rejected auctions as dull in farmer view (auctions.index)
//test the code for errors ,bugs.
//address the n-1 problem.
//add functionality for rating prodcuts.
//add coupon code functionality.
//add a product recommendation engine.




//BUGS

//bug in creating auctions - create() method , returns the last added item for creating auction , there isn't any check for the owner of the item.
//crct the mistakes with showing individual results pages.
//bug in deleting products , auctions , items etc .No check for owner!

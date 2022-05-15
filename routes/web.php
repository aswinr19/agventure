<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\GuidelineController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SoilTestController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\weatherController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    $products = Product::all()
        ->take(8);

    return view('index', ['title' => 'Welcome Page', 'products' => $products]);
});

Route::get('/admin', function () {
    return view('adminHomePage', ['title' => 'Admin Page']);
})
    ->middleware('isAdmin');

Route::get('/farmer', function () {
    return view('farmerHomePage', ['title' => 'Farmer Page']);
})
    ->middleware('isFarmer');

//common routes

Route::get('/products', [ProductController::class, 'display']);

Route::get('/product/{id}', [ProductController::class, 'displayOne']);

Route::get('/machines', [MachineController::class, 'display']);

Route::get('/machine/{id}', [MachineController::class, 'displayOne']);

Route::get('/checkout/success', [PurchaseController::class, 'success']);

Route::get('/checkout/failed', [PurchaseController::class, 'failed']);

Route::post('/cart/proceed-to-buy', [CartController::class, 'prodceedToBuy']);

Route::get('/tips', [TipController::class, 'display']);

Route::get('/guidelines', [GuidelineController::class, 'display']);

Route::get('/guideline/{id}', [GuidelineController::class, 'displayOne']);


//

Route::middleware(['isLoggedIn'])->group(function () {

    Route::get('/checkout', [PurchaseController::class, 'create']);

    Route::post('/checkout', [PurchaseController::class, 'makeTransaction']);

    Route::get('/auctions', [AuctionController::class, 'display']);

    Route::get('/auctions/{id}', [AuctionController::class, 'displayOne']);

    Route::post('/auctions/new-bid', [AuctionController::class, 'startBid']);

    Route::post('/auction/update-bid', [AuctionController::class, 'updateBid']);

    Route::get('/auction/results', [AuctionController::class, 'userResult']);

    Route::post('/auction/results/proceed-to-buy/{id}', [AuctionController::class, 'prodceedToBuy']);

    Route::post('/checkout/create-address', [AddressController::class, 'store']);

    Route::post('/checkout/update-address/{id}', [AddressController::class, 'change']);

    Route::get('/checkout/delete-address/{id}', [AddressController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'display']);

    Route::get('/orders/{id}', [OrderController::class, 'displayOne']);

    Route::get('/orders/cancel-order/{id}', [OrderController::class, 'cancel']);

    Route::get('/profile', [UserController::class, 'show']);

    Route::post('/profile/update-profile', [UserController::class, 'change']);

    Route::get('/profile/delete-profile', [UserController::class, 'destroy']);

    Route::get('/cart', [CartController::class, 'index']);

    Route::post('/add-to-cart', [CartController::class, 'store']);

    Route::get('cart/delete-cart-item/{id}', [CartController::class, 'destroy']);

    Route::get('/cart/increment-cart-item-count/{id}', [CartController::class, 'increment']);

    Route::get('/cart/decrement-cart-item-count/{id}', [CartController::class, 'decrement']);

    Route::get('/experts', [ExpertController::class, 'display']);

    Route::get('/expert/{id}', [ExpertController::class, 'displayOne']);

    Route::post('/expert/book-appointment', [AppointmentController::class, 'store']);

    Route::get('/expert/cancel-appointment', [AppointmentController::class, 'destroy']);

    Route::get('/appointments', [AppointmentController::class, 'index']);

    Route::get('/soil-test/appointments', [SoilTestController::class, 'display']);

    Route::get('/soil-test/appointments/{id}', [SoilTestController::class, 'displayOne']);

    Route::get('/soil-test/create-soil-test', [SoilTestController::class, 'create']);

    Route::post('/soil-test/create-soil-test', [SoilTestController::class, 'store']);

    Route::get('/soil-test/update-soil-test/{id}', [SoilTestController::class, 'update']);

    Route::post('/soil-test/update-soil-test', [SoilTestController::class, 'change']);

    Route::post('/soil-test/proceed-to-pay/{id}', [SoilTestController::class, 'prodceedToPay']);

    Route::get('/soil-test/checkout', [SoilTestController::class, 'createCheckout']);

    Route::post('/soil-test/checkout', [SoilTestController::class, 'makeTransaction']);

    Route::get('/soil-test/checkout/success', [SoilTestController::class, 'success']);

    Route::get('/soil-test/checkout/failed', [SoilTestController::class, 'failed']);

    Route::get('/weather', [weatherController::class, 'index']);

});

//auth routes

Route::controller(UserController::class)->middleware(['isNotLoggedIn'])->group(function () {

    Route::get('/auth/signup', 'create');

    Route::post('/auth/signup', 'store');

    Route::get('/auth/signin', 'login');

    Route::post('/auth/signin', 'check');

});

Route::get('auth/logout', [UserController::class, 'logout'])->middleware('isLoggedIn');

//specific routes

//soil tests

Route::controller(SoilTestController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/soil-test/appointments', 'index');

    Route::get('/admin/soil-test/appointments/{id}', 'show');

});

//category routes

Route::controller(CategoryController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/categories', 'index');

    Route::get('/admin/create-category', 'create');

    Route::post('/admin/create-category', 'store');

    Route::get('/admin/update-category/{id}', 'update');

    Route::post('/admin/update-category', 'change');

    Route::get('/admin/delete-category/{id}', 'destroy');

});

//product routes

Route::controller(ProductController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/products', 'index');

    Route::get('/admin/product/{id}', 'show');

    Route::get('/admin/create-product', 'create');

    Route::post('/admin/create-product', 'store');

    Route::get('/admin/update-product/{id}', 'update');

    Route::post('/admin/update-product', 'change');

    Route::get('/admin/delete-product/{id}', 'destroy');

});

//order routes

Route::controller(OrderController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/orders', 'index');

    Route::get('/admin/orders/{id}', 'show');

    Route::get('/admin/orders/update/packed/{id}', 'packed');

    Route::get('/admin/orders/update/shipped/{id}', 'shipped');

    Route::get('/admin/orders/update/delivered/{id}', 'delivered');
});

//item routes
Route::controller(ItemController::class)->middleware(['isFarmer'])->group(function () {

    Route::get('/farmer/items', 'index');

    Route::get('/farmer/item/{id}', 'show');

    Route::get('/farmer/create-item', 'create');

    Route::post('/farmer/create-item', 'store');

    Route::get('/farmer/update-item/{id}', 'update');

    Route::post('/farmer/update-item', 'change');

    Route::get('/farmer/delete-item/{id}', 'destroy');
});

//auction routes

Route::controller(AuctionController::class)->middleware(['isFarmer'])->group(function () {

    Route::get('/farmer/auctions', 'index');

    Route::get('/farmer/auction/{id}', 'show');

    Route::get('/farmer/create-auction', 'create');

    Route::post('/farmer/create-auction', 'store');

    Route::get('/farmer/update-auction/{id}', 'update');

    Route::post('/farmer/update-auction', 'change');

    Route::get('farmer/delete-auction/{id}', 'destroy');

    Route::get('farmer/auction/results/{id}', 'result');

    Route::get('farmer/auction/results/approve/{id}', 'approveBid');

});

Route::controller(AuctionController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/auctions', 'indexAdmin');

    Route::get('/admin/auction/{id}', 'showAdmin');

    Route::get('/admin/auction/approve/{id}', 'approve');

    Route::get('/admin/auction/reject/{id}', 'reject');

});

//complaint routes

Route::controller(ComplaintController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/user/complaints', 'index');

    Route::get('/user/complaint/{id}', 'show');

    Route::get('/user/create-complaint', 'create');

    Route::post('/user/create-complaint', 'store');

    Route::get('/user/update-complaint/{id}', 'update');

    Route::get('/user/update-complaint', 'change');

    Route::get('/user/delete-complaint/{id}', 'destroy');
});

//guideline routes

Route::controller(GuidelineController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/guidelines', 'index');

    Route::get('/admin/guideline/{id}', 'show');

    Route::get('/admin/create-guideline', 'create');

    Route::post('/admin/create-guideline', 'store');

    Route::get('/admin/update-guideline/{id}', 'update');

    Route::post('/admin/update-guideline', 'change');

    Route::get('/admin/delete-guideline', 'destroy');

});

//machine routes

Route::controller(MachineController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/machines', 'index');

    Route::get('/admin/machine/{id}', 'show');

    Route::get('/admin/create-machine', 'create');

    Route::post('/admin/create-machine', 'store');

    Route::get('/admin/update-machine/{id}', 'update');

    Route::post('/admin/update-machine', 'change');

    Route::get('/admin/delete-machine/{id}', 'destroy');

});

//tips

Route::controller(TipController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/tips', 'index');

    Route::get('/admin/tip/{id}', 'show');

    Route::get('/admin/create-tip', 'create');

    Route::Post('/admin/create-tip', 'store');

    Route::get('/admin/update-tip/{id}', 'update');

    Route::post('/admin/update-tip', 'change');

    Route::get('/admin/delete-tip', 'destroy');

});

//exxperts

Route::controller(ExpertController::class)->middleware(['isAdmin'])->group(function () {

    Route::get('/admin/experts', 'index');

    Route::get('/admin/experts/{id}', 'show');

    Route::get('/admin/create-expert', 'create');

    Route::post('/admin/create-expert', 'store');

    Route::get('/admin/update-expert', 'update');

    Route::post('/admin/update-expert', 'change');

    Route::get('/admin/delere-expert', 'destroy');

});

//users

Route::get('/admin/user-profiles', [UserController::class, 'index'])->middleware('isAdmin');

//133

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

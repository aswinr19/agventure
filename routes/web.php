<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
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

Route::get('/auth/signup',function(){
    return view('signup',['title'=>'Signup']);
});

Route::post('/auth/signup',function(Request $request){


//validate before saving to database

   $validatedData = $request->validate([
       'first_name'=>'required|min:2',
       'last_name'=>'required',
       'email'=>'required|email|unique:users',
       'phone'=>'required|digits:10|unique:users',
       'password'=>'required|min:6|max:14',
       
   ]);
       // saving data to database
         $user = new User;
         $user->user_name = $request->first_name . " ". $request->last_name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->password = Hash::make($request->password);
         $user->role = $request->role;
         $save = $user->save();
   
        if($save){
                return back()->with('success','New user has been successfuly created');
        }else{
                return back()->with('fail','Something went wrong, try again later');
        }
    


});

Route::get('/auth/signin',function(){
    return view('signin',['title'=>'Signin']);
});

Route::post('/auth/signin',function(Request $request){

  //validate before comparing
    $validatedData = $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6|max:14',
    ]);
    // dd($validatedData);


    //fetching user info for comparing
    $userInfo = User::where('email','=',$request->email)->first();


    if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
    }else{

        //password check
            if(Hash::check($request->password,$userInfo->password)){

                    //if the password is correct store the user id in session  and
                    // redirect to corresponding home page
                    $request->session()->put('loggedUser',$userInfo->id);
                  
                    return redirect("/$userInfo->role");

            }else{

                return back()->with('fail','Incorrect password');
            }
    }
    
});


Route::get("/products",function(){
    return view('products',['title'=>'Products page']);
});

Route::get('/product/{id}',function($id){
    return view('product',['title'=>'Product page']);
});

Route::get('/admin/create-product',function(){
    return view('createProduct',['title'=>'Create product page']);
});

Route::post('/admin/create-product',function(){
    
});

Route::get('/user/auctions',function(){
        return view('auctions',['title'=>'Auctions page']);
});


Route::get('/user/auction/{id}',function($id){
    return view('auction',['title'=>'Auction page']);
});

Route::get('/farmer/create-item',function(){
        return view('createItem',['title'=>'Create item page']);
});

Route::post('/farmer/create-item',function(){

});


Route::get('/farmer/create-auction',function(){
    return view('createAuction',['title'=>'Create auction page']);
});


Route::post('/farmer/create-auction',function(){
    
});
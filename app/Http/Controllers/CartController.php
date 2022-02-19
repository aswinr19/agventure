<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        //find all cart items matching the user ids

     
    }

    public function store(Request $request){

        $cartItem = new Cart();
        $cartItem->user_id =  $request->session()->get('loggedUser');
        $cartItem->product_id = $request->product_id;
        $cartItem->machine_id = $request->machine_id;

    }

    public function destroy($id){

        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

    }
    //
}

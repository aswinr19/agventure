<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request){

         //find all cart items matching the user ids
        
        $id = $request->session()->get('loggedUser');
        $cartItems = Cart::latest()->where('user_id',$id)->get();

        // dd($cartItems);

        return view('cartItems.index',['title'=>'Cart items page','cartItems'=>$cartItems]);
        

     
    }

    public function store(Request $request){

        $cartItem = new Cart();
        $cartItem->user_id =  $request->session()->get('loggedUser');
        $cartItem->product_id = $request->product_id;
        $cartItem->machine_id = $request->machine_id;
        $cartItem->save();

        return redirect('/cart');

    }

    public function destroy($id){

        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect('/cart');

    }

    public function increment($id){


        $cartItem  = Cart::findOrFail($id);

        if($cartItem->count>0){

            $cartItem->count = $cartItem->count + 1;
            $cartItem->save();
        }


        return redirect('/cart');
    }

    public function decrement($id){

        
        $cartItem  = Cart::findOrFail($id);

        if($cartItem->count>1){

            $cartItem->count = $cartItem->count - 1;
            $cartItem->save();
        }

       

        return redirect('/cart');

    }
    
}

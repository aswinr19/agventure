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

        $id = $request->session()->get('loggedUser');

        $cartItems = Cart::all()
                                ->where('user_id',$id);

        $exists = false;

         foreach($cartItems as $item){

             if($item->machine_id == $request->machine_id or $item->product_id == $request->product_id){

                 $ci = Cart::findOrFail($item->id);

                 if($ci->count>0){

                     $ci->count = $ci->count + 1;
                     $ci->save();
                        $exists = true;
                 }
             }
         }

        if(!$exists){

        $cartItem = new Cart();
        $cartItem->user_id =  $id;
        $cartItem->product_id = $request->product_id;
        $cartItem->machine_id = $request->machine_id;
        $cartItem->save();

        return redirect('/cart');

        }
        else{
            return redirect('/cart');
        }

        

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

    public function prodceedToBuy(Request $request){

        $total = $request->total;
        $request->session()->put('totalAmount',$total);

        return redirect('/checkout');

    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\User;
use Stripe;
use Exception;






class PurchaseController extends Controller
{

    public function create(Request $request){

        // dd($request->session()->get('totalAmount'));

        $id = $request->session()->get('loggedUser');


        $addresses = Address::latest()
                ->where('user_id',$id)->get();


        $paymentDetails = Payment::latest()
                ->where('user_id',$id)->get();


        return view('checkout.index',['title'=>'Checkout page','addresses'=>$addresses,'paymentDetails'=>$paymentDetails]);
        
    }




    public function makeTransaction(Request $request){


        $id = $request->session()->get('loggedUser');

        //fetch the cart items corresponding to current loggedin user
         $cartItems = Cart::latest()->where('user_id',$id)->get();

        //addressId
        $addressId = $request->selected_address;

        //find the address with the id sent from the view ( selected address )
        $address = Address::findOrFail($addressId);

         //total amount 
         $totalAmount =  $request->session()->get('totalAmount');

         //card details
         $cardNumber = $request->card_number;
 
         $expiryMonth = $request->expiry_month;
 
         $expiryYear = $request->expiry_year;
 
         $cvv = $request->cvv;
 

        if($request->payment_method == "cod"){


            $this->store($id,$addressId,0,$totalAmount,"cod","pending");

            $this->resetCart($id);

            $this->linkItemts($cartItems);

            
        }
        elseif($request->payment_method == "card"){

        }

    }



    public function resetCart($user_id){

        $cartItems = Cart::latest()
            ->where('user_id',$user_id)
                ->get();

        foreach($cartItems as $item){

            $item->delete();
        }
        

    }

    public function store($userId,$addressId,$cardNumber,$amount,$paymentMethod,$status){

        $purchase = new Purchase();
        $purchase->user_id = $userId;
        $purchase->address_id = $addressId;
        $purchase->card_number = $cardNumber;
        $purchase->amount = $amount;
        $purchase->delivery_charge = 60;
        $purchase->total = $amount+60;
        $purchase->payment_method = $paymentMethod;
        $purchase->status = $status;
        $purchase->order_status = "ordered";

        $purchase->save();

    }

    public function linkItemts($cartItems){
        

        $purchase = Purchase::latest()->first()->get();

        foreach($cartItems as $item){
            
            if($item->machine_id){

                $purchase->machines()->attach($item->machine_id);
            }
            elseif( $item->product_id){

                $purchase->products()->attch($item->product_id);
            }
        }

        return redirect('/');

    }

}





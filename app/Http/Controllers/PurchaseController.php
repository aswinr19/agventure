<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\User;
use Cartalyst\Stripe\Stripe;
use Exception;






class PurchaseController extends Controller
{

    public function create(Request $request){

        $id = $request->session()->get('loggedUser');


        $addresses = Address::latest()
                ->where('user_id',$id)->get();


        $paymentDetails = Payment::latest()
                ->where('user_id',$id)->get();


        return view('checkout.index',['title'=>'Checkout page','addresses'=>$addresses,'paymentDetails'=>$paymentDetails]);
        
    }

    public function resetCart($id){

        $cartItems = Cart::where('user_id',$id)
                ->delete();

    }


    // make transcation action makes the actual transaction and calls the store action to store the transaction details
    public function makeTransaction(Request $request){


        $id = $request->session()->get('loggedUser');

        $user = User::findOrFail($id);

        //fetch the cart items corresponding to current loggedin user
        $cartItems = Cart::where('user_id',$id)->get();

        //find the address with the id sent from the view ( selected address )
        $address = Address::findOrFail($request->selected_address);

        //total amount 
        $totalAmount =  $request->session()->get('totalAmount');

        //card details

        $cardNumber = $request->card_number;

        $expiryMonth = $request->expiry_month;

        $expiryYear = $request->expiry_year;

        $cvv = $request->cvv;

        //validation for payment method cod transactions
        if($request->payment_method == "cod"){

            $request->validate([
                
            ]);

        }
          //validation for payment method card transactions
        if($request->payment_method == "card"){

            $request->validate([  
                
              
            ]);

        }

        //logic for cod transactions
        if($request->payment_method == "cod"){

                    $mode = "cod";
                    $status = "pending"; 
                    $this->store($id,$address->id,$totalAmount,$mode,$status);
                    $this->resetCart($id);

        }
        //logic for card transactions
        else if($request->payment_method == "card"){
            
            $stripe = Stripe::make(env('STRIPE_SECRET'));

            try{

                $token = $stripe->tokens->create([
                    'card'=>[
                        'number'=> $request->card_number,
                        'exp_year'=>$request->expiry_year,
                        'exp_month'=>$request->expiry_month,
                        'cvc'=>$request->cvv
                    ]
                ]);

                if(!isset($token['id'])){

                    session()->flash('stripe_error','The stripe token was not generated correctly!');
                }

                $customer = $stripe->customer()->create([
                    'name'=> $user->name,
                    'email'=> $user->email,
                    'phone'=> $user->phone,
                    'address'=>[
                        'line1'=> $address->house_name.' '.$address->street,
                        'postal_code'=> $address->pincode,
                        'city'=> $address->city,
                        'state'=> $address->state,
                        'country'=> 'India'
                    ],
                    'shipping'=>[
                        
                        'name'=> $address->name,
                    'email'=> $user->email,
                    'phone'=> $address->phone,
                    'address'=>[
                        'line1'=> $address->house_name.' '.$address->street,
                        'postal_code'=> $address->city,
                        'city'=> $address->city,
                        'state'=> $address->state,
                        'country'=> 'India'
                    ],
                    ],
                    'source'=> $token['id']
                ]);

                $charge = $stripe->charges()->create([

                    'customer'=> $customer['id'],
                    'currency'=>'INR',
                    'amount'=> $totalAmount,
                    'description'=>'Payment for order no : '
                ]);

                if($charge['status'] == 'succeeded'){
                    $mode = "card";
                    $status = "success"; 
                    $this->store($id,$address->id,$totalAmount,$mode,$status);
                    $this->resetCart($id);
                } 
                else
                {
                    session()->flash('stripe_error','Error in transaction!');
                    $mode = "card";
                    $status = "failed"; 
                    $this->store($id,$address->id,$totalAmount,$mode,$status);
                    $this->resetCart($id);
                }
            }
            catch(Exception $e){

                session()->flash('stripe_error',$e->getMessage());
            }
        }
    }
    public function store($userId , $addressId,$totalAmount ,$mode ,$status){

        $purchase = new Purchase();
        $purchase->user_id = $userId;
        $purchase->address_id = $addressId;
        // $purchase->payment_id = $paymentId;
        $purchase->amount = $totalAmount;
        $purchase->delivery_charge = 60;
        $purchase->total = $totalAmount + 60;
        $purchase->payment_method = $mode;
        $purchase->status = $status;
        $purchase->save();

        
        return redirect('/');


    }

}

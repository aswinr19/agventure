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
use Illuminate\Contracts\Session\Session;

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

    public function makeTransaction(Request $request){


        $id = $request->session()->get('loggedUser');
        $user = User::findOrFail($id);
        $cartItems = Cart::where('user_id',$id)->get();

        if($request->payment_method == "cod"){

            $request->validate([
                
            ]);

        }
        if($request->payment_method == "card"){

            $request->validate([
                
            ]);

        }


        if($request->payment_method == "cod"){



        }
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

                    session->flash('stripe_error','The stripe token was not generated correctly!');
                }

                $customer = $stripe->customer()->create([
                    'name'=> ,
                    'email'=>,
                    'phone'=>,
                    'address'=>[
                        'line1'=>,
                        'postal_code'=>,
                        'city'=>,
                        'state'=>,
                        'country'=>
                    ],
                    'shipping'=>[
                        
                        'name'=>,
                    'email'=>,
                    'phone'=>,
                    'address'=>[
                        'line1'=>,
                        'postal_code'=>,
                        'city'=>,
                        'state'=>,
                        'country'=>
                    ],
                    ],
                    'source'=> $token['id'];
                ]);

                $charge = $stripe->charges()->create([
                    'customer'=> $customer['id'],
                    'currency'=>'INR',
                    'amount'=> $totalAmount,
                    'description'=>'Payment for order no : '
                ]);

                $if($charge['status'] == 'succeeded'){

                } 
                else
                {
                    session()->flash('stripe_error','Error in transaction!');
                }
            }
            catch(Exception $e){

                session()->flash('stripe_error',$e->getMessage());
            }
        }
    }
    public function store($user_id , $status){

        $purchase = new Purchase();
        $purchase->save();

        
        return redirect('/');


    }

}

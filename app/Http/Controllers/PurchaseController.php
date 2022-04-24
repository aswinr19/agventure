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

        $user = User::findOrFail($id);

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
 
        //  dd($cardNumber,$expiryMonth,$expiryYear,$cvv);
      


        // if($request->payment_method == "cod"){


        //     $this->store($id,$addressId,0,$totalAmount,"cod","pending");

        //     // $this->linkItemts($cartItems);

        //     $this->resetCart($id);

            
        // }
        // elseif($request->payment_method == "card"){

        //     $this->store($id,$addressId,$cardNumber,$totalAmount,"card","succesful");

        //     // $this->linkItemts($cartItems);

        //     $this->resetCart($id);

        // }




        //logic for cod transactions
        if($request->payment_method == "cod"){

            $this->store($id,$addressId,0,$totalAmount,"cod","pending");
            $this->resetCart($id);

            return redirect('/checkout');

}
//logic for card transactions
else if($request->payment_method == "card"){
    
    $stripe = Stripe::make(env('STRIPE_SECRET'));

    try{

        $token = $stripe->tokens->create([
            'card'=>[
                'number'=> $cardNumber,
                'exp_year'=>$expiryYear,
                'exp_month'=>$expiryMonth,
                'cvc'=>$cvv
            ]
        ]);

        if(!isset($token['id'])){

            session()->flash('stripe_error','The stripe token was not generated correctly!');
            return redirect('/checkout');
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
          
            $this->store($id,$addressId,$cardNumber,$totalAmount,"card","succesful");
            $this->resetCart($id);
          
        } 
        else
        {
            session()->flash('stripe_error','Error in transaction!');

            $this->store($id,$addressId,$cardNumber,$totalAmount,"card","failed");
            return redirect('/checkout');

        }
    }
    catch(Exception $e){

        session()->flash('stripe_error',$e->getMessage());
    }
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





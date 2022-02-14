<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function store(Request $request){

        $request->validate([
            
            'payment_method'=>'required'

        ]);

        $payment = new Payment();
        $payment->user_id = $request->session()->get('loggedUser');
        $payment->payment_method = $request->payment_method;
        $payment->card_number = $request->card_number;
        $payment->cvv = $request->cvv;
        $payment->valid_through = $request->valid_through;
        $payment->upi_id = $request->upi_id;
        $payment->save();
        

    }

    public function change(Request $request){

    }

    public function delete($id){
        
    }
}

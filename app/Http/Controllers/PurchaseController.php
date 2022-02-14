<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Payment;

class PurchaseController extends Controller
{

    public function create(){

        $addresses = Address::all();
        $paymentDetails = Payment::all();
        return view('checkout.index',['title'=>'Checkout page','addresses'=>$addresses,'paymentDetails'=>$paymentDetails]);
        
    }
    public function store(Request $request){


    }
}

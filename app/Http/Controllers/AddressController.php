<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'house_name'=>'required',
            'street'=>'required',
            'pincode'=>'required',
            'district'=>'required',
            'state'=>'required'
        ]);

        $address = new Address();
        $address->user_id = $request->session()->get('loggedUser');
        $address->house_name = $request->house_name;
        $address->street = $request->street;
        $address->pincode = $request->pincode;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->save();
    }

    public function change(Request $request){

        $request->validate([
            'house_name'=>'required',
            'street'=>'required',
            'pincode'=>'required',
            'district'=>'required',
            'state'=>'required'
        ]);

        $address =  Address::findOrFail($request->id);
        $address->house_name = $request->house_name;
        $address->street = $request->street;
        $address->pincode = $request->pincode;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->save();
    
    }

    public function delete($id){
        
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Item;


use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){

    }

    public function show(){

    }

    public function create(){

        return view('items.create',['title'=>'Create item page']);

    }

    public function store(Request $request){


        $validatedData = $request->validate([

            'item_name' => 'required|min:2',
            'item_description' => 'required',
            'item_price' => 'required',
            'quantity' => 'required',
            'item_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = time().'-'. $request->item_name.'.'. 
        $request->item_image->extension();
        $request->item_image->move(public_path('images'),$newImageName);

        $item = new Item();
        $item->name = $request->item_name;
        $item->description = $request->item_description;
        $item->quantity = $request->quantity;
        $item->price = $request->item_price;
        $item->image = $request->item_image;
        $item->save();


        
    }
}

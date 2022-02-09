<?php

namespace App\Http\Controllers;
use App\Models\Item;


use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){
        $items = Item::all();

        return view('items.index',['title'=>'Items page','items'=>$items]); 
    }

    public function show($id){
        $item = Item::findOrFail($id);
        return view('items.show',['title'=>'Item page','item'=>$item]);
    }

    public function create(){
        return view('items.create',['title'=>'Create item page']);
    }

    public function store(Request $request){


        $validatedData = $request->validate([

            'item_name' => 'required|min:2',
            'item_description' => 'required',
            'quantity' => 'required',
            'item_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = time().'-'. $request->item_name.'.'. 
        $request->item_image->extension();

        // dd($newImageName);

        $request->item_image->move(public_path('images'),$newImageName);

        $item = new Item();
        $item->name = $request->item_name;
        $item->description = $request->item_description;
        $item->user_id = $request->session()->get('loggedUser');
        $item->quantity = $request->quantity;
        $item->image = $newImageName;
        $item->save();

        return redirect('/farmer/create-auction');
        
    }

    public function update($id){
        $item = Item::findOrFail($id);
        return view('items.update',['title' => 'Update item Page','item'=>$item]);
    }

    public function change(Request $request){
        $validatedData = $request->validate([

            'item_name' => 'required|min:2',
            'item_description' => 'required',
            'quantity' => 'required',
            // 'item_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        // $newImageName = time().'-'. $request->item_name.'.'. 
        // $request->item_image->extension();

        // dd($newImageName);

        // $request->item_image->move(public_path('images'),$newImageName);

        $item = Item::findOrFail($request->id);
        $item->name = $request->item_name;
        $item->description = $request->item_description;
        $item->user_id = $request->session()->get('loggedUser');
        $item->quantity = $request->quantity;
         $item->image = $request->item_image;
        $item->save();
        return redirect('/farmer/items');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect('/farmer/items');
    }
}

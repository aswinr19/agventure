<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{

public function index(Request $request){
    
    $id = $request->session()->get('loggedUser');
    
    $machines = Machine::latest()
        ->where('user_id',$id)->get();

    return view('machines.index',['title'=>'Machines page','machines'=>$machines]);

}   

public function show($id){
    
    $machine  = Machine::findOrFail($id);
    return view('machines.show',['title'=>'Machine page','machine'=>$machine]);
}

public function create(){

    $categories  = Category::all();
    return view('machines.create',['title'=>'Create machine page','categories'=>$categories]);
}

public function store(Request $request){


    $request->validate([
        'name'=>'required',
        'description'=>'required',
        'category'=>'required',
        'quantity'=>'required',
        'price'=>'required',
        'image' => 'required|mimes:jpg,png,jpeg|max:5048',
    ]);


    $newImageName = time().'-'. $request->name.'.'. 
    $request->image->extension();

    // dd($newImageName);

    $request->image->move(public_path('images'),$newImageName);

    $machine = new Machine();
    $machine->user_id = $request->session()->get('loggedUser');
    $machine->name = $request->name;
    $machine->description = $request->description;
    $machine->category  = $request->category;
    $machine->quantity = $request->quantity;
    $machine->price = $request->price;
    $machine->image = $newImageName;
    $machine->save();
    
    return redirect('/admin/machines');
}

public function update($id){

    $machine = Machine::findOrFail($id);
    $categories  = Category::all();
    return view('machines.update',['title'=>'Update machine page','machine'=>$machine,'categories'=>$categories]);
}

public function change(Request $request){


    $request->validate([
        'name'=>'required',
        'description'=>'required',
        'category'=>'required',
        'quantity'=>'required',
        'price'=>'required',
    ]);

    $machine =  Machine::findOrFail($request->id);
    $machine->name = $request->name;
    $machine->description = $request->description;
    $machine->category  = $request->category;
    $machine->quantity = $request->quantity;
    $machine->price = $request->price;
    $machine->save();
    return redirect('/admin/machines');
}

public function destroy($id){

    $machine =  Machine::findOrFail($id);

    $machine->delete();
    return redirect('/admin/machines');
}

public function display(){

    $machines = Machine::latest();

    if(request('search')){
        $machines
        ->where('name','like','%'.request('search').'%')
        ->orWhere('description','like','%'.request('search').'%');
    }

    return view('machines.display',['title'=>'Machines page','machines'=>$machines->get()]);
}

public function displayOne($id){

    $machine = Machine::findOrFail($id);

    return view('machines.displayOne',['title'=>'Machine page','machine'=>$machine]);
}
}

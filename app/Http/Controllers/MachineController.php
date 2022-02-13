<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{

public function index(){

    $machines = Machine::all();
    return view('machines.index',['title'=>'Machines page','machines'=>$machines]);

}   

public function show($id){
    
    $machine  = Machine::findOrFail($id);
    return view('machines.show',['title'=>'Machine page','machine'=>$machine]);
}

public function create(){

    return view('machines.create',['title'=>'Create machine page']);
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
    return view('machines.update',['title'=>'Update machine page']);
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
}

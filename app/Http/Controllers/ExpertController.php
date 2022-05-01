<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index(Request $request){

        $id = $request->session()->get('loggedUser');

        $experts = Expert::latest()
                                ->where('user_id',$id)->get();

        return view('experts.index',['title'=>'Experts page','experts'=>$experts]);
    }

    public function show($id){

        $expert = Expert::findOrFail($id);

        return view('experts.show',['title'=>'Expert page','expert'=>$expert]);

    }

    public function create(){

        return view('experts.create',['title'=>'Create expert page']);

    }

    public function store(Request $request){

        $request->validate([

            'name'=>'required',
            'description'=>'required',
            'designation'=>'required',
            'email_id'=>'required',
            'address'=>'required'

        ]);

        $expert = new Expert();
        $expert->name = $request->name;
        $expert->description = $request->description;
        $expert->designation = $request->designation;
        $expert->email_id = $request->email_id;
        $expert->address = $request->address;

        $expert->save();

        // return redirect();
        
    }

    public function update($id){

        $expert = Expert::findOrFail($id);

        return view('experts.update',['title'=>'Update expert page','expert'=>$expert]);

    }

    public function change(Request $request){

        $request->validate([

            'name'=>'required',
            'description'=>'required',
            'designation'=>'required',
            'email_id'=>'required',
            'address'=>'required'

        ]);

        $expert  = Expert::findOrFail($request->id);

        $expert->name = $request->name;
        $expert->description = $request->description;
        $expert->designation = $request->designation;
        $expert->email_id = $request->email_id;
        $expert->address = $request->address;

        $expert->save();

        // return redirect();

    } 

    public function destroy($id){

        $expert = Expert::findOrFail($id);

        $expert->destroy();

        // return redirect();
    }

    public function display(){

        $experts = Expert::all();

        return view('experts.display',['title'=>'Experts page','experts'=>$experts]);

    }

    public function displayOne($id){

        $expert = Expert::findOrFail($id);

        return view('experts.displayOne',['title'=>'Expert page','expert'=>$expert]);
    }
}

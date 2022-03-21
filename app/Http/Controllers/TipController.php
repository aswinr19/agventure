<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index(){

        $tips = Tip::all();
        return view('tips.index',['title'=>'Tips page','tips'=>$tips]);

    }

    public function show($id){


        $tip = Tip::findOrFail($id);
        return view('tips.show',['title'=>'Tip Page','tip'=>$tip]);
    }

    public function create(){

        return view('tips.create',['title'=>'Create tip Page']);
    }

    public function store(Request $request){


        $request->validate([

            'title'=>'required',
            'description'=>'required',
            'url'=>'required'

        ]);

        $tip = new Tip();
        $tip->user_id = $request->session()->get('loggedUser');
        $tip->title = $request->title;
        $tip->description = $request->description;
        $tip->url = $request->url;
        $tip->save();

        return redirect('/admin/tips');
    }

    public function update($id){

        $tip = Tip::findOrFail($id);
        return view('tips.update',['title'=>'Update tip Page','tip'=>$tip]);

    }

    public function change(Request $request){

            $request->validate([

                'title'=>'required',
                'description'=>'required',
                'url'=>'required'
    
            ]);

            $tip = Tip::findOrFail($request->id);
            $tip->user_id = $request-> $request->session()->get('loggedUser');
            $tip->title = $request->title;
            $tip->description = $request->description;
            $tip->url = $request->url;
       
        return redirect('/admin/tips');
    }

    public function destroy($id){

        $tip = Tip::findOrFail($id);
        $tip->delete();  
    }
    public function display(){

        $tips = Tip::latest()->get();

        return view('tips.display',['title'=>'Tips page','tips'=> $tips]);
    }

    
}

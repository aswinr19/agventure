<?php

namespace App\Http\Controllers;

use App\Models\Guideline;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{


public function index(){
 
    $guidelines = Guideline::all();
    return view('guidelines.index',['title'=>'Guidelines page','guidelines'=>$guidelines]);
}

public function show($id){

    $guideline = Guideline::findOrFail($id);
    return view('guidelines.show',['title'=>'Guideline page','guideline'=>$guideline]);
}

public function create(){

    return view('guidelines.create',['title'=>'Create guideline page']);
}
    
public function store(Request $request){

    $request->validate([
        'disease_name'=>'required',
        'short_description'=>'required',
        'symptoms' =>'required',
        'image' => 'required|mimes:jpg,png,jpeg|max:5048',
    ]);

    $newImageName = time().'-'. $request->disease_name.'.'. 
        $request->image->extension();

        // dd($newImageName);

        $request->image->move(public_path('images'),$newImageName);

    $guideline = new Guideline();
    $guideline->disease_name = $request->disease_name;
    $guideline->short_description = $request->short_description;
    $guideline->symptoms = $request->symptoms;
    $guideline->image = $newImageName;
    $guideline->save();
    return redirect('/admin/guidelines');
}

public function update($id){

    $guideline = Guideline::findOrFail($id);
    return view('guidelines.update',['title'=>'Update guideline page','guideline'=>$guideline]);
}

public function change(Request $request){

    $request->validate([
        'disease_name'=>'required',
        'short_description'=>'required',
        'symptoms' =>'required',
    ]);

    $guideline = Guideline::findOrFail($request->id);
    $guideline->disease_name = $request->disease_name;
    $guideline->short_description = $request->short_description;
    $guideline->symptoms = $request->symptoms;
    $guideline->save();

    return redirect('/admin/guidelines');
}

public function destroy($id){

    $guideline = Guideline::findOrFail($id);
    $guideline->delete();
    return redirect('/admin/guidelines');
}
//
}

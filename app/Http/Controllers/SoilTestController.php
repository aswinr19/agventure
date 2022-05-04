<?php

namespace App\Http\Controllers;

use App\Models\Soil_test;
use Illuminate\Http\Request;

class SoilTestController extends Controller
{

    
    public function index(){

        $tests = Soil_test::latest()
                                ->get();

        return view('soilTests.index',['title'=>'Soil tests page','tests'=>$tests]);

    }

    public function show($id){

        $test  = Soil_test::findOrFail($id);

        return view('soilTests.show',['title'=>'Soil test page','test'=>$test]);

    }

    public function create(){

        return view('soilTests.create',['title'=>'Create soil test page']);

    }

    public function store(Request $request){

    }

    public function update($id){

        return view('soilTests.update',['title'=>'Update soil test page']);
    }

    public function change(Request $request){

    }

    public function cancel($id){

    }

    public function display(Request $request){

        $id = $request->session()->get('loggedUser');
        
        $tests = Soil_test::where('user_id',$id)
                                ->get();

        return view('soilTests.index',['title'=>'Soil tests page','tests'=>$tests]);

    }

    public function displayOne($id){

        $test  = Soil_test::findOrFail($id);
        
        return view('soilTests.displayOne',['title'=>'Soil test page','test'=>$test]);

    }

}

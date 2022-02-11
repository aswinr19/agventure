<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function index(){

        $complaints = Complaint::latest()->get();
        return view('complaints.index',['title'=>'Complaints page','complaints'=>$complaints]);

    }
    
    public function show($id){

        $complaint = Complaint::findOrFail($id);
        return view('Complaints.show',['title'=>'Complaint page','complaint'=>$complaint]);

    }
    public function create(){

        return view('complaints.create',['title'=>'Create complaint page']);

    }
    public function store(Request $request){

        $request->validate([
            'subject'=>'required',
            'complaint'=>'required',
        ]);

        $newImageName = time().'-'. $request->subject.'.'. 
        $request->proof->extension();

        // dd($newImageName);

        $request->proof->move(public_path('images'),$newImageName);

        $complaint = new Complaint();
        $complaint->user_id = $request->session()->get('loggedUser');
        $complaint->suject = $request->subject;
        $complaint->proof = $request->proof;
        $complaint->complaint = $newImageName;
        
        $complaint->save();

        return redirect('/user/complaints');

    }
    public function update($id){

        $complaint = Complaint::findOrFail($id);
        return view('complaints.update',['title'=>'Update complaint page','complaint'=>$complaint]);

    }
    public function change(Request $request){

        $request->validate([
            'subject'=>'required',
            'complaint'=>'required',
        ]);
        
        $newImageName = time().'-'. $request->subject.'.'. 
        $request->proof->extension();

        // dd($newImageName);

        $request->proof->move(public_path('images'),$newImageName);

        $complaint = Complaint::findOrFail($request->id);
        $complaint->user_id = $request->session()->get('loggedUser');
        $complaint->suject = $request->subject;
        $complaint->complaint = $request->complaint;
        $complaint->proof = $request->proof;
        $complaint->save();
        return redirect('/user/complaints');

    }
    public function destroy($id){
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
        return redirect('/user/complaints');
    }
}

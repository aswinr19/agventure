<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

    public function index(){

        $users = User::all();

        return view('users.index',['title'=>'Users page','users'=>$users]);

    }
    public function show(Request $request){

        $id =  $request->session()->get('loggedUser'); 

        $user = User::findOrFail($id);

        // dd($user);

        return view('users.show',['title'=>'User page','user'=>$user]);
        
    }
    public function create(){

        return view('users.create',['title'=>'Signup']);
    }
    public function store(Request $request){

        $validatedData = $request->validate([

            'first_name'=>'required|min:2|max:20|alpha',
            'last_name'=>'required|min:2|max:20|alpha',
            'email'=>'required|email|unique:users',
            'phone'=>'required|digits:10|unique:users',
            'password'=>'required|min:6|max:14',
            'role'=>'required'
            
        ]);
            // saving data to database
              $user = new User;
              $user->name = $request->first_name . " ". $request->last_name;
              $user->email = $request->email;
              $user->phone = $request->phone;
              $user->password = Hash::make($request->password);
              $user->role = $request->role;
              $save = $user->save();
        
             if($save){
                     return back()->with('success','New user has been successfuly created');
             }else{
                     return back()->with('fail','Something went wrong, try again later');
             }
         
        
    }

    public function login(){

        return view('users.login',['title'=>'Signin']);
        
    }


    public function check(Request $request){
        //    
        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:14',
        ]);
        // dd($validatedData);
    
    
        //fetching user info for comparing
        $userInfo = User::where('email','=',$request->email)->first();
    
    
        if(!$userInfo){
                return back()->with('fail','We do not recognize your email address');
        }else{
    
            //password check
                if(Hash::check($request->password,$userInfo->password)){
    
                        //if the password is correct store the user id in session  and
                        // redirect to corresponding home page
                        $request->session()->put('loggedUser',$userInfo->id);

                        
                        if($userInfo->role=='user'){

                          return redirect('/');
                            
                            
                        }
                        else{
                             return redirect("/$userInfo->role");
                            

                        }
    
                }else{
    
                    return back()->with('fail','Incorrect password');
                }
        }

    }

    public function change(Request $request){

        $request->validate([
        'name'=>'required|min:2|max:20|alpha',
        'email'=>'required|email|unique:users',
        'phone'=>'required|digits:10|unique:users',
        'password'=>'required|min:6|max:14',
    ]);


              $id = $request->session()->get('loggedUser');
              $user = User::findOrFail($id);
              $user->name = $request->name;
              $user->email = $request->email;
              $user->phone = $request->phone;
              $user->password = Hash::make($request->password);
              $save = $user->save();
        
             if($save){
                     return back()->with('success','User has been successfuly updated!');
             }else{
                     return back()->with('fail','Something went wrong, please try again later');
             }
    }

    public function destroy($id){

        $user = User::fincOrFail($id);
        $user->delete();
        
        redirect('/');

    }
    public function logout(Request $request){

        $request->session()->forget('loggedUser');
        return redirect('/');
    }
   
    //
}

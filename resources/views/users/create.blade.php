@extends('layouts.layout')
@section('content')

<br>
<div class="container col-4 shadow-none p-3 mb-5 bg-light rounded"  style="top: 14px;">
<!-- <form>

</form> -->
<form action="/auth/signup" method="POST">
@csrf
    

  <div class="text-center"><strong style="color:green">Registraion</strong></div>

  <span class="successmsg">
  @if(Session::get('success'))
    {{ Session::get('success') }}
    @endif
    </span>
    <span class="errormsg">
    @if(Session::get('fail'))
    {{ Session::get('fail') }}
    @endif
    </span>
    <br>
  <div class="row">
    <div class="col">
    <label for="exampleInputEmail1">First Name</label>
    <input class="form-control"  type="text" name="first_name" placeholder="" value= "{{ old('first_name') }}"">
    <span class="errormsg">@error('first_name') {{ $message }} @enderror</span>    
</div>
    <div class="col">
    <label for="exampleInputPassword1">Last Name</label>
    <input class="form-control" type="text" name="last_name" placeholder="" value= "{{ old('last_name') }}"> 
    <span class="errormsg">@error('last_name') {{ $message }}@enderror</span>
    </div>
  </div>


  <!-- <div class="form-group"> -->
    <!-- <label for="exampleInputEmail1">First Name</label>
    <input class="form-control"  type="text" name="first_name" placeholder="" value= "{{ old('first_name') }}"">
    <span class="errormsg">@error('first_name') {{ $message }} @enderror</span> -->
  <!-- </div> -->
  <!-- <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input class="form-control" type="text" name="last_name" placeholder="" value= "{{ old('last_name') }}"> 
    <span class="errormsg">@error('last_name') {{ $message }}@enderror</span>
    </div> -->
    <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input class="form-control"  type="text" name="email" placeholder="" value= "{{ old('email') }}">
    <span class="errormsg">@error('email') {{ $message }} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input class="form-control"  type="text" name="phone" placeholder="" value= "{{ old('phone') }}">
    <span class="errormsg">@error('phone') {{ $message }} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input class="form-control"  type="password" name="password" placeholder="" value= "{{ old('password') }}">
    <span class="errormsg">@error('password') {{ $message }} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Role</label>
    <!-- <input class="form-control"  type="password" name="password" placeholder="" value= "{{ old('password') }}"> -->
    <select class="form-control" name="role">
        <option class="form-control" value="role" selected disabled  style="color:gray">Role</option>
        <option class="form-control" value="user">User</option>
        <option class="form-control" value="farmer">Farmer</option>
    </select>
    <span class="errormsg">@error('role') {{ $message }} @enderror</span>
  </div>
       
    
  <button type="submit" class="btn btn-success btn-block "name="submit">Signup</button> <br>
   <div class="text-center"> <a style="text-decoration: underline;"href="/auth/signin">Or Login </a></div>
</form>
</div>

<!-- <div class="space" style="margin: 217px;"></div> -->
@endsection

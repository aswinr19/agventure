@extends('layouts.layout')
@section('content')

<br> 
<div class="container col-4 shadow-none p-3 mb-5 bg-light rounded"  style="top: 67px;">
<form method="POST" action="/auth/signin">
  @csrf
  
  <div class="text-center"><strong class="head" style="color:green">Login</strong></div>
  <span class="errormsg">
         @if(Session::get('fail'))
        {{ Session::get('fail')  }}
    @endif
         </span>
         <span class="success">
         @if(Session::get('success'))
        {{ Session::get('success')  }}
    @endif
         </span>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input class="form-control"  type="text" name="email" placeholder="Email Address" value="{{ old('email') }}">
    <span class="errormsg">@error('email')   {{ $message }}@enderror</span>
    <!-- <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input class="form-control" type="password" name="password" placeholder="Password">
    <span class="errormsg">@error('password') {{ $message }}@enderror</span>
        <br>
         
    <!-- <input type="password"  id="exampleInputPassword1" placeholder="Password"> -->
  </div>

  <button type="submit" class="btn btn-success btn-block "name="submit">Signin</button> <br>
  <!-- <input type="submit" class="button">   <br> -->
   <div class="text-center"> <a style="text-decoration: underline;"href="/auth/signup">Or Register </a></div>
</form>
</div>
<div class="space" style="margin: 217px;"></div>
<br><br> <br>
@endsection

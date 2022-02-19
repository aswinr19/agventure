@extends('layouts.layout')
@section('content')
<h2>Signin</h2>
<form action="/auth/signin" method="POST">
    @csrf
   
    <label for="email">Email </label> <br>
    <input type="text" name="email" placeholder="Enter email address" value="{{ old('email') }}"> <br>
    <span>@error('email') 
        
    {{ $message }}

    @enderror</span> <br>
    <label for="password">Password </label><br>
    <input type="password" name="password" placeholder="Enter email password"> <br>
    <span>@error('password') 
        
        {{ $message }}
    
        @enderror</span>
         <br>
         <span>
         @if(Session::get('fail'))
        {{ Session::get('fail')  }}
    @endif
         </span> <br>
    <input type="submit" value="submit" name="submit"> <br>
    <a href="/auth/signup">I don't have an account , create new </a>
    
</form>
@endsection
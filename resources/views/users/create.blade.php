@extends('layouts.layout')
@section('content')
<h2>Signup</h2>
<form action="/auth/signup" method="POST">
    @csrf
    @if(Session::get('success'))
    {{ Session::get('success') }}
    @endif
    @if(Session::get('fail'))
    {{ Session::get('fail') }}
    @endif
    <br>
    <label for="first_name">First Name </label> <br>
    <input type="text" name="first_name" placeholder="Enter  first name" value= "{{ old('first_name') }}"> <br>
    <span>@error('first_name') 
        
    {{ $message }}

    @enderror</span> <br>
    <label for="last_name">Last Name </label><br>
    <input type="text" name="last_name" placeholder="Enter  last name" value= "{{ old('last_name') }}"> <br>
    <span>@error('last_name') 
        
    {{ $message }}

    @enderror</span> <br>
    <label for="email">Email </label><br>
    <input type="text" name="email" placeholder="Enter email address" value= "{{ old('email') }}">  <br>
    <span>@error('email') 
        
    {{ $message }}

    @enderror</span> <br>
    <label for="phone">Phone </label><br>
    <input type="text" name="phone" placeholder="Enter phone number" value= "{{ old('phone') }}"> <br>
    <span>@error('phone') 
        
    {{ $message }}

    @enderror</span> <br>
    <label for="password">Password </label><br>
    <input type="password" name="password" placeholder="Enter password"> <br>
    <span>@error('password') 
        
    {{ $message }}

    @enderror</span> <br>
   
    <select name="role">
        <option value="role" selected disabled >Role</option>
        <option value="user">User</option>
        <option value="farmer">Farmer</option>
    </select> <br>
    <span>@error('role') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <input type="submit" value="submit" name="submit">  <br>
    <a href="/auth/signin">I already have an account , sign in</a>
</form>
@endsection
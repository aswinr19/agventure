@extends('layouts.layout')
@section('section')
<h2>Profile</h2>
{{ $user->name }}
{{ $user->email }}
{{ $user->phone }}
<button>Edit</button>

<form action="/profile/update-profile" method="POST">
@csrf
    @if(Session::get('success'))
    {{ Session::get('success') }}
    @endif
    @if(Session::get('fail'))
    {{ Session::get('fail') }}
    @endif
    <br>
    <label for="name">Full Name </label> <br>
    <input type="text" name="name" placeholder="Enter  first name" value= "{{ $user->name  }}"> <br>
    <span>@error('name') 
        
    {{ $message }}

    @enderror</span> <br>
   
    <label for="email">Email </label><br>
    <input type="text" name="email" placeholder="Enter email address" value= "{{ $user->email }}">  <br>
    <span>@error('email') 
        
    {{ $message }}

    @enderror</span> <br>
    <label for="phone">Phone </label><br>
    <input type="text" name="phone" placeholder="Enter phone number" value=" {{ $user->phone }}"> <br>
    <span>@error('phone') 
        
    {{ $message }}

    @enderror</span> <br>
    <input type="submit" value="submit" name="submit">  <br>
</form>
@endsection
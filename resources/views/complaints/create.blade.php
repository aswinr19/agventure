@extends('layouts.layout')
@section('content')
<h2>Create Complaints</h2>
<form action="/user/create-complaint" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="subject">Subject</label> <br>
    <input type="text" name="subject"><br>
    <span>@error('subject') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="complaint">Complaint</label> <br>
    <input type="text" name="complaint" ><br>
    <span>@error('complaint') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="proof">Proof</label> <br>
    <input type="file" name="proof"> <br>
    <span>@error('proof') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <input type="submit" value="submit" name="submit">
</form>
@endsection
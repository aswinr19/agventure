@extends('layouts.layout')
@section('content')
<h2>Update Complaints</h2>
<form action="/user/update-complaint" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $complaint->id }}"> 
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
    <input type="submit" value="submit" name="submit">
</form>
@endsection
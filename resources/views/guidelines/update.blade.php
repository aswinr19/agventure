@extends('layouts.layout')
@section('content')

<h2>Update Guideline</h2> 
<form action="/admin/update-guideline" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $guideline->id }}">
    <label for="disease_name">Disease Name</label> <br>
    <input type="text" name="disease_name"><br>
    <span>@error('disease_name') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="short_description">Short Description</label> <br>
    <input type="text" name="short_description"> <br>
    <span>@error('short_description') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="symptoms">Symptoms</label> <br>
    <input type="text" name="symptoms"><br>
    <span>@error('symptoms') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <input type="submit" value="submit" name="submit">
</form>
@endsection
@extends('layouts.layout')
@section('content')
<h2>Create Guideline</h2>
<form action="/admin/create-guideline" method="POST" enctype="multipart/form-data">
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
    <label for="image">Image</label> <br>
    <input type="file" name="image" > <br>
    <span>@error('image') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <input type="submit" value="submit" name="submit">
</form>

@endsection
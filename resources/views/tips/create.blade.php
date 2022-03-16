@extends('layouts.layout')
@section('content')
<h2>Create Tip</h2>
<form action="/admin/create-tip" method="POST">
@csrf
    <label for="title">Title</label><br>
    <input type="text" name="title"><br>
    <span>@error('title') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="description">Description</label><br>
    <input type="text" name="description"><br>
    <span>@error('description') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="url">Url</label><br>
    <input type="text" name="url"><br>
    <span>@error('url') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <input type="submit" value="submit" name="submit">
 
</form>
@endsection
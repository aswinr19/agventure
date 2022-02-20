@extends('layouts.layout')
@section('content')
<h2>Update Tip</h2>
<form action="/admin/update-tip" method="POST">
    <input type="hidden" name="id" value="{{ $tip->id }} ">
    <label for="title">Title</label><br>
    <input type="text" name="title" value="{{ $tip->title }} "><br>
    <span>@error('title') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="description">Description</label><br>
    <input type="text" name="description" value="{{ $tip->description }}" ><br>
    <span>@error('description') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="url">Url</label><br>
    <input type="text" name="url" value="{{ $tip->url }}"><br>
    <span>@error('url') 
        
        {{ $message }}
    
        @enderror</span> <br>
 
</form>
@endsection
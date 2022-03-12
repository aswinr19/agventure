@extends('layouts.layout')
@section('content')
<h2>Create Category</h2>

<form action="/admin/create-category" method="POST">
<label for="name">Name</label><br>
<input type="text" name="name"><br>
<span>@error('name') 
        
        {{ $message }}
    
        @enderror</span> <br>
<input type="submit" value="submit" name="submit">
</form>

@endsection
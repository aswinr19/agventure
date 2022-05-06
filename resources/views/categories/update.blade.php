@extends('layouts.layout')
@section('content')
<h2>Update Category</h2>

<form action="/admin/update-category" method="POST">
<input type="hidden" name="id" value="{{ $category->id }}">
<label for="name">Name</label><br>
<input type="text" name="name"  value="{{ $category->name }}"><br>
<span class="error-msg">@error('name') 
        
        {{ $message }}
    
        @enderror</span> <br>
<input type="submit" value="submit" name="submit">
</form>

@endsection
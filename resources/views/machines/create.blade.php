@extends('layouts.layout')
@section('content')
<h2>Create Machine</h2>
<form action="/admin/create-machine" method="POST" enctype="multipart/form-data">
    <label for="name">Machine Name</label><br>
    <input type="text" name="name"><br>
    <span>@error('name') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="description">Machine Description</label> <br>
        <input type="text" name="description" ><br>
        <span>@error('description') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="category">Category</label><br>
        <select name="category" id="">
        <option value="category"  selected disabled>Category</option>
        <option value=""></option>
        <option value=""></option>
        <option value=""></option>
    </select> <br>
    <span>@error('category') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="quantity">Quantity</label> <br>
        <input type="text" name="quantity" ><br>
        <span>@error('quantity') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="price">Price</label> <br>
        <input type="text" name="price" ><br>
        <span>@error('price') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="image">Image</label> <br>
        <input type="file" name="image" ><br>
        <span>@error('image') 
        
        {{ $message }}
    
        @enderror</span> <br>
</form>
@endsection
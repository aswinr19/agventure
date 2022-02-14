@extends('layouts.layout')
@section('content')
<h2>Update Machine</h2>
<form action="/admin/update-machine" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $machine->id }}">machine
    <input type="hidden" name="image" value="{{ $machine->image }}">
    <label for="name">Machine Name</label> <br>
    <input type="text" name="name" value="{{ $machine->name }}"><br>
    <span>@error('name') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="description">Machine Description</label> <br>
    <input type="text" name="description" value="{{ $machine->description }}"><br>
    <span>@error('description') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="category">Category</label> <br>
    <select name="category" id="">
        <option value="category"  selected disabled>Category</option>
        <option value=""></option>
        <option value=""></option>
        <option value=""></option>
    </select> <br>
    <span>@error('category') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="quantity">Stock </label> <br>
    <input type="text" name="quantity" value="{{ $machine->quantity }}"><br>
    <span>@error('quantity') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="product_price"> Price</label> <br>
    <input type="text" name="price" value="{{ $machine->price }}"><br>
    <span>@error('price') 
        
        {{ $message }}
    
        @enderror</span> <br>

    <input type="submit" value="submit" name="submit">
    
</form>
@endsection
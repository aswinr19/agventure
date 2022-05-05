@extends('layouts.adminLayout')
@section('content')
<h2>Update Machine</h2>
<form action="/admin/update-machine" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $machine->id }}">machine
    <input type="hidden" name="image" value="{{ $machine->image }}">
    <label for="name">Machine Name</label> <br>
    <input type="text" name="name" value="{{ $machine->name }}"><br>
    <span class="error-msg">@error('name') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="description">Machine Description</label> <br>
    <input type="text" name="description" value="{{ $machine->description }}"><br>
    <span class="error-msg">@error('description') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="category">Category</label> <br>
    <select name="category" >
        <option value="category"  selected disabled>Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>        
        @endforeach
    </select> <br>
    <span class="error-msg">@error('category') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="quantity">Stock </label> <br>
    <input type="text" name="quantity" value="{{ $machine->quantity }}"><br>
    <span class="error-msg">@error('quantity') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="product_price"> Price</label> <br>
    <input type="text" name="price" value="{{ $machine->price }}"><br>
    <span class="error-msg">@error('price') 
        
        {{ $message }}
    
        @enderror</span> <br>

    <input type="submit" value="submit" name="submit">
    
</form>
@endsection
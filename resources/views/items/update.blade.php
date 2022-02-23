@extends('layouts.layout')
@section('content')
<h2>Create Item</h2>
<form action="/farmer/update-item" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$item->id}}">
    <input type="hidden" name="item_image" value="{{$item->image}}">
    <label for="item_name">Item Name</label> <br>
    <input type="text" name="item_name" value="{{$item->name}}"><br>
    <span>@error('item_name') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="item_description">Item Description</label> <br>
    <input type="text" name="item_description" value="{{$item->description}}"><br>
    <span>@error('item_description') 
        
        {{ $message }}
    
        @enderror</span> <br>
 
    <label for="quantity">Item Quantity </label> <br>
    <input type="text" name="quantity" value="{{$item->quantity}}"><br>
    <span>@error('quantity') 
        
        {{ $message }}
    
        @enderror</span> <br>
   
    <!-- <label for="item_image">Item Image </label> <br>
    <input type="file" src="" alt="" name="item_image"><br>
    <span>@error('item_image') 
        
        {{ $message }}
    
        @enderror</span> <br> -->
    <input type="submit" value="submit" name="submit">
    
</form>
@endsection
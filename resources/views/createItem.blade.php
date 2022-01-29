@extends('layouts.layout')
@section('content')
<h2>Create Item</h2>
<form action="/farmer/create-item" method="POST">
    @csrf
    <label for="name">Item Name: </label>
    <input type="text" name="name"><br>
    <label for="description">Item Description: </label>
    <input type="text" name="description"><br>
    <label for="category">Category: </label>
    <input type="text" name="category"><br>
    <label for="quantity">Item Quantity: </label>
    <input type="text" name="quantity"><br>
    <label for="price">Item Price: </label>
    <input type="text" name="price"><br>
    <label for="image">Item Image: </label>
    <input type="file" src="" alt=""><br>
    <input type="submit" value="submit" name="submit">
    
</form>
@endsection
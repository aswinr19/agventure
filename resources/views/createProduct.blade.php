@extends('layouts.layout')
@section('content')
<h2>Create Product</h2>
<form action="/admin/create-product" method="POST">
    @csrf
    <label for="name">Product Name: </label>
    <input type="text" name="name"><br>
    <label for="description">Product Description: </label>
    <input type="text" name="description"><br>
    <label for="category">Category: </label>
    <input type="text" name="category"><br>
    <label for="quantity">Product Quantity: </label>
    <input type="text" name="quantity"><br>
    <label for="price">Product Price: </label>
    <input type="text" name="price"><br>
    <label for="suitable">Suitable Crops: </label>
    <input type="text" name="suitable"><br>
    <label for="recommended">Recommended Crops: </label>
    <input type="text" name="recommended"><br>
    <label for="composition">Composition: </label>
    <input type="text" name="composition"><br>
    <label for="image">Product Image: </label>
    <input type="file" src="" alt=""><br>
    <input type="submit" value="submit" name="submit">
    
</form>
@endsection
@extends('layouts.layout')
@section('content')
<h2>Update Product</h2>
<form action="/admin/update-product" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="product_image" value="{{ $product->image }}">
    <label for="product_name">Product Name</label> <br>
    <input type="text" name="product_name" value="{{ $product->name }}"><br>
    <span>@error('product_name') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="product_description">Product Description</label> <br>
    <input type="text" name="product_description" value="{{ $product->description }}"><br>
    <span>@error('product_description') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="category">Category</label> <br>
    <select name="category" id="">
        <option value="category"  selected disabled>Category</option>
        <option value="seed">Seed</option>
        <option value="pesticide">Pesticide</option>
        <option value="fertilizer">Fertilizer</option>
    </select> <br>
    <span>@error('category') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="quantity">Product Quantity </label> <br>
    <input type="text" name="quantity" value="{{ $product->quantity }}"><br>
    <span>@error('quantity') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="product_price">Product Price</label> <br>
    <input type="text" name="product_price" value="{{ $product->price }}"><br>
    <span>@error('product_price') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="suitable_crops">Suitable Crop </label> <br>
    <input type="text" name="suitable_crops" value="{{ $product->suitable_crops }}"><br>
    <span>@error('suitable_crops') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="recommended_crops">Recommended Crops</label> <br>
    <input type="text" name="recommended_crops" value="{{ $product->recommended_crops }}"><br>
    <span>@error('recommended_crops') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="composition">Composition</label> <br>
    <input type="text" name="composition" value="{{ $product->composition}}" ><br>
    <span>@error('composition') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <!-- <label for="product_image">Product Image </label> <br> -->
    <!-- <input type="file" src="" alt="" name="product_image" value="{{ $product->image }}"><br>
    <span>@error('product_image') 
        
        {{ $message }}
    
        @enderror</span> <br> -->
    <input type="submit" value="submit" name="submit">
    
</form>
@endsection
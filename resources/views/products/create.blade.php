@extends('layouts.adminLayout')
@section('content')
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Product</h2><br>
<form action="/admin/create-product" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- new one -->
  <div class="row">
    <div class="col">
    <label for="product_name">Product Name</label> 
    <input type="text" class="form-control" name="product_name"><br>
    <span class="error-msg">@error('product_name'){{ $message }}@enderror</span> 
    </div>
    <div class="col">
    <label for="product_description">Product Description</label> 
    <input type="text" class="form-control" name="product_description">
    <span class="error-msg">@error('product_description'){{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="category">Category</label> 
    <select name="category"class="form-control"  >
        <option value="category"  selected disabled>Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>        
        @endforeach
    </select> 
    <span class="error-msg">@error('category'){{ $message }}@enderror</span>
    </div>
    <div class="col">
    <label for="quantity">Product Quantity </label> 
    <input type="text" class="form-control" name="quantity">
    <span class="error-msg">@error('quantity') {{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="product_price">Product Price</label> 
    <input type="text" class="form-control" name="product_price">
    <span class="error-msg">@error('product_price'){{ $message }}@enderror</span> 
    </div>
    <div class="col">
    <label for="suitable_crops">Suitable Crop </label> 
    <input type="text" class="form-control" name="suitable_crops">
    <span class="error-msg">@error('suitable_crops'){{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="recommended_crops">Recommended Crops</label> 
    <input type="text"class="form-control" name="recommended_crops">
    <span class="error-msg">@error('recommended_crops') {{ $message }}@enderror</span> 
    </div>
    <div class="col">
    <label for="composition">Composition</label> 
    <input class="form-control" type="text" name="composition">
    <span class="error-msg">@error('composition'){{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="product_image">Product Image </label> 
    <input class="form-control" type="file" src="" alt="" name="product_image">
    <span class="error-msg">@error('product_image'){{ $message }}@enderror</span> 
    </div>

    <div class="col"style="margin-top: 23px;">
    <input type="submit" style="float:right"value="submit" name="submit" class="btn btn-warning">
    </div>
  </div>
  
</form>
    <!-- new one end -->
    </div>
 

  

    
  

  
    

@endsection
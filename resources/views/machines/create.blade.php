@extends('layouts.adminLayout')
@section('content')

<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Machine</h2>
<form action="/admin/create-machine" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="row">
    <div class="col">
    <label for="name">Machine Name</label>
    <input class="form-control"type="text" name="name">
    <span class="error-msg">@error('name'){{ $message }}@enderror</span>     </div>
    <div class="col">
    <label for="description">Machine Description</label> 
        <input class="form-control"type="text" name="description" >
        <span class="error-msg">@error('description'){{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="category">Category</label> 
    <select class="form-control"name="category" >
        <option value="category"  selected disabled>Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>        
        @endforeach
    </select>
    <span class="error-msg">@error('category') {{ $message }}@enderror</span>
    </div>
    <div class="col">
    <label for="quantity">Quantity</label> 
        <input class="form-control"type="text" name="quantity" >
        <span class="error-msg">@error('quantity'){{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="price">Price</label> 
        <input class="form-control"type="text" name="price" >
        <span class="error-msg">@error('price'){{ $message }}@enderror</span> 
    </div>
    <div class="col">
    <label for="image">Image</label> 
        <input class="form-control"type="file" name="image" >
        <span class="error-msg">@error('image'){{ $message }}@enderror</span> 
    </div>
  </div>
  <div class="row">
    <div class="col">
     
    </div>
    <div class="col" style="margin-top: 23px;">
    <input type="submit" style="float:right" value="submit" name="submit" class="btn btn-warning">
    </div>
    
    
  </div>
</form>
</div>
@endsection
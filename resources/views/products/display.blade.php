@extends('layouts.layout')
@section('content')
<div class="container">
<center style="padding: 18px 0px 0px 0px;">
  <h1> Products</h1>
</center>
@if ($products->count())
<div class="row" style="padding: 29px;">
    @foreach($products as $product)
    <a href="/product/{{ $product->id }}">
    <!-- <img src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}" height="100px"><br> -->
    <!-- <span> {{ $product->name }}</span> <br> -->
   
    <!-- <span> </span> <br> -->
    <!-- <span></span> <br> -->

<!-- new template  -->

  <div class="col-sm-3" style="padding: 18px 30px 11px 45px;">
  <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}"style="width:275;height:185px;">
  <div class="card-body" style="padding:.8rem">
    <p class="card-text">
    <div class="product-shop">
<span class="product-name" itemprop="name">{{ $product->name }}</span>
<div class="price-box">
<p class="old-price">
<span class="price">
<span><span class="price">₹ {{ $product->price }}</span></span>
<span class="strike-through"></span>
</span>
<!-- <span class="label-price">/500g</span> -->
</p>
</a>
<!-- <p class="special-price">
<span class="price">
<span><span class="price">₹139.00</span></span>
</span>
<span class="label-price">/500g</span>
</p> -->
</div>
<div class="short-desc ellipsis-text" ><p>{{ $product->description }}</p></div>

</div>
    </p>
  </div>
</div>
 
  

    @endforeach
    </div>
@else
    <p>No products yet. Please check back later.</p>
@endif
</div>
@endsection
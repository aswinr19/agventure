@extends('layouts.layout')
@section('content')
<div class="container">
<center style="padding: 18px 0px 0px 0px;">
<br>
  <h2> Products</h2>
  <br>
</center>
@if ($products->count())

    @foreach($products as $product)</a>
    <div class="row" >
<!-- new template  -->

  <div class="col-sm-3" style="padding: 18px 30px 11px 45px;">
  <a href="/product/{{ $product->id }}">

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
<!-- <div class="short-desc ellipsis-text" ><p>{{ $product->description }}</p></div> -->
<div class="short-desc ellipsis-text" ><p>{{ \Illuminate\Support\Str::limit($product->description, 150, $end='...') }}
</p></div>
</div>
    </p>
  </div>
</div>
</div>
    @endforeach

@else
<center style="padding: 18px 0px 0px 0px;">
    <p>No products yet. Please check back later.</p>
</center>
@endif
</div>
@endsection

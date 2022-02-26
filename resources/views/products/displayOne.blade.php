@extends('layouts.layout')
@section('content')
<h2>Product</h2>

<img src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}" height="250px"><br>
<span> {{ $product->name }}</span> <br>
<span>{{ $product->description }}</span> <br>
<span> {{ $product->quantity }}</span> <br>
<span> ₹ {{ $product->price }}</span> <br>
<button>Buy Now</button>
<form action="/add-to-cart" method="POST">
@csrf
<input type="hidden" name="product_id" value="{{$product->id}}">
<input type="submit" value="Add To Cart" name="submit">
</form>

@endsection
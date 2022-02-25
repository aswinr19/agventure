@extends('layouts.layout')
@section('content')
<h2>Product</h2>

<img src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}" height="250px"><br>
<span> {{ $product->name }}</span> <br>
<span>{{ $product->description }}</span> <br>
<span> {{ $product->quantity }}</span> <br>
<span> ₹ {{ $product->price }}</span> <br>
<button>Buy Now</button>
<button>Add To Cart</button>

@endsection
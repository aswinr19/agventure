@extends('layouts.layout')
@section('content')
<h2>Products</h2>

@if ($products->count())
    @foreach($products as $product)
    <a href="/product/{{ $product->id }}">
    <img src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}" height="100px"><br>
    <span> {{ $product->name }}</span> <br>
    </a>
    <span> ₹ {{ $product->price }}</span> <br>
    <span>{{ $product->description }}</span> <br>
    @endforeach
@else
    <p>No products yet. Please check back later.</p>
@endif


@endsection
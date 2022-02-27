@extends('layouts.layout')

@section('content')
<h2>Cart Items</h2>
<table>
@foreach($cartItems as $item)
<span> {{ $item->product->name}} 
<img src="{{ asset('images/'. $item->product->image)}}" alt="{{ $item->product->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br>
@endforeach
</table>
<a href="/checkout">Checkout</a>

@endsection
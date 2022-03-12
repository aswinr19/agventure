@extends('layouts.layout')

@section('content')
<h2>Cart Items</h2>
<table>
@foreach($cartItems as $item)
@if($item->product_id)
<span> {{ $item->product->name}} 
<img src="{{ asset('images/'. $item->product->image)}}" alt="{{ $item->product->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br>
@endif
@if($item->machine_id)
<span> {{ $item->machine->name}} 
<img src="{{ asset('images/'. $item->machine->image)}}" alt="{{ $item->machine->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br>
@endif
@endforeach
</table>
<a href="/checkout">Checkout</a>

@endsection
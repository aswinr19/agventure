@extends('layouts.layout')

@section('content')
<h2>Cart Items</h2>
<table>
@php
$total = 0 ;
@endphp
@foreach($cartItems as $item)
@if($item->product_id)
<span> {{ $item->product->name }} <span> {{ $item->product->price }} 
<img src="{{ asset('images/'. $item->product->image)}}" alt="{{ $item->product->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br>
@php
$total += ($item->product->price) * $item->count;
@endphp
@endif
@if($item->machine_id)
<span> {{ $item->machine->name }} 
<img src="{{ asset('images/'. $item->machine->image)}}" alt="{{ $item->machine->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br>
@php
$total += ($item->machine->price) * $item->count;
@endphp
@endif
@endforeach
</table>
@if($cartItems->count()>0)
<form action="/cart/proceed-to-buy" method="POST">
@csrf
<input type="hidden" name="total" value="{{ $total }}">
<input type="submit" value="Proceed To Buy" name="submit">
</form>
@else
<h4> Empty cart!</h4>
@endif
@endsection
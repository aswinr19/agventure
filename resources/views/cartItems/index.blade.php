@extends('layouts.layout')

@section('content')
<h2>Cart Items</h2>
<table>
@foreach($cartItems as $item)
<td>{{ $item->product->name }}</td>
<td>+</td>
<td>{{ $item->product->quantity }</td>
<td>-</td>
<td>{{ $item->product->price }</td>
<td>delete</td>
@endforeach
</table>
<a href="/checkout">Checkout</a>

@endsection
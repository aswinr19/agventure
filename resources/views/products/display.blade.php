@extends('layouts.layout')
@section('content')
<h2>Products</h2>
@foreach($products as $product)
<a href="/product/{{ $product->id }}"></a>
<img src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}" height="100px"><br>
<span> {{ $product->name }}</span> <br>
<span> ₹ {{ $product->price }}</span> <br>
<span>{{ $product->description }}</span> <br>
@endforeach
</form>
@endsection
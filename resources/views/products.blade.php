@extends('layouts.layout')
@section('content')
<h2>Products</h2>
@foreach($products as $product)
{{
    $product->id
}}
{{
    $product->name
}}
{{
    $product->description
}}
{{
    $product->category
}}
<img src="{{
    asset('images/'. $product->image)
}}" alt="{{ $product->image }} " height="100px">


@endforeach
@endsection
@extends('layouts.layout')
@section('content')
<!-- <h2>Product</h2> -->
<style>
    .maindiv{
        display:flex;
        margin: 23px;
    }
    .left{
        flex: .4;
    }
    .right{
        flex:.6;
        padding: 24px;
    }
    .maincontent{
        font-weight: bolder;
font-size: 22px;
    }
    #addtocart{
        color:white;
        background-color: green;
        margin-top: 9px;
    }
</style>
<!-- <h2>product</h2> -->
<div class="maindiv">
    <div class="left">
    <img src="{{ asset('images/'. $product->image) }}"" style="  margin-left: 144px;"alt="{{ $product->name }}" height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{ $product->name }}</span> <br>
<span>{{ $product->description }}</span> <br>
<!-- <span>{{ $product->category->name }}</span> <br> -->
<span> {{ $product->quantity }}&nbsp Left</span> <br>
<span class="maincontent"> ₹ {{ $product->price }}</span> <br>
<form action="/add-to-cart" method="POST">
@csrf
<input type="hidden" name="product_id" value="{{$product->id}}">
<input type="submit" value="Add To Cart" class="btn btn-success"id="addtocart"name="submit">
</form>
    </div>
</div>

<!-- <img src="{{ asset('images/'. $product->image) }}"" alt="{{ $product->name }}" height="250px"><br> -->




@endsection
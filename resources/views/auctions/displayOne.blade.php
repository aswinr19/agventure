@extends('layouts.layout')
@section('content')
<h2>Auction</h2>
    <img src="{{ asset('images/'. $auction->item->image) }}"" alt="{{ $auction->item->name }}" height="100px"><br>
    <span> {{ $auction->item->name }}</span> <br>
    <span> ₹ {{ $auction->starting_amount}}</span> <br>
    <span>{{ $auction->item->description }}</span> <br>
@endsection
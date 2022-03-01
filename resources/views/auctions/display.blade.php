@extends('layouts.layout')
@section('content')
<h2>Auctions</h2>
@if ($auctions->count())
    @foreach($auctions as $auction)
    <a href="/auction/{{ $auction->id }}">
    <img src="{{ asset('images/'. $auction->item->image) }}"" alt="{{ $auction->item->name }}" height="100px"><br>
    <span> {{ $auction->item->name }}</span> <br>
    </a>
    <span> ₹ {{ $auction->starting_amount}}</span> <br>
    <span>{{ $auction->item->description }}</span> <br>
    <span>{{ $auction->duration }}</span> <br>
    @endforeach
@else
    <p>No auctions yet. Please check back later.</p>
@endif


@endsection
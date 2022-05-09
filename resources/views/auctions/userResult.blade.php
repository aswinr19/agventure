@extends('layouts.layout')
@section('content')
<h2>Results</h2>
@if($bids->count() > 0)
@foreach($bids as $bid)
    {{ $bid->user->name }} <br>
    {{ $bid->auction->user->name}} <br>
    {{ $bid->bid}} <br>
    {{ $bid->status }} &nbsp;&nbsp;
    @if($bid->status == "approved" )
        <!-- <a href="/auction/results/proceed-to-buy/{{ $bid->auction_id }}">Proceed To Buy</a> <br> <br> -->
        <form action="/auction/results/proceed-to-buy/{{ $bid->auction_id }}" method="POST">
            @csrf
            <input type="hidden" name="total" value="{{ $bid->bid }}">
            <input type="submit" value="Proceed To Buy" name="submit">
        </form>
    @endif
@endforeach
@else
    No bids yet!
@endif
@endsection
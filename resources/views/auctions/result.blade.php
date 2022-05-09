@extends('layouts.adminLayout')
@section('content')

<h2>Results</h2>

@if($bids->count() > 0)
    @foreach($bids as $bid)
    {{ $bid->user->name }} <br>
    {{ $bid->auction->user->name}} <br>
    {{ $bid->bid}} <br>
    {{ $bid->status }} <br>
    <a href="/farmer/auction/results/approve/{{ $bid->id }}">approve</a> <br> <br>
    @endforeach
@else
    No bids yet!
@endif
@endsection
@extends('layouts.layout')
@section('content')
<h2>Machines</h2>
@if ($machines->count())
    @foreach($machines as $machine)
    <a href="/machine/{{ $machine->id }}">
    <img src="{{ asset('images/'. $machine->image) }}"" alt="{{ $machine->name }}" height="100px"><br>
    <span> {{ $machine->name }}</span> <br>
    </a>
    <span> ₹ {{ $machine->price }}</span> <br>
    <span>{{ $machine->description }}</span> <br>
    @endforeach
@else
    <p>No products yet. Please check back later.</p>
@endif

@endsection
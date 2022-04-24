@extends('layouts.layout')
@section('content')
<h2>Machine</h2>

<img src="{{ asset('images/'. $machine->image) }}"" alt="{{ $machine->name }}" height="250px"><br>
<span> {{ $machine->name }}</span> <br>
<span>{{ $machine->description }}</span> <br>
<span> {{ $machine->quantity }}</span> <br>
<span> ₹ {{ $machine->price }}</span> <br>
<form action="/add-to-cart" method="POST">
@csrf
<input type="hidden" name="machine_id" value="{{$machine->id}}">
<input type="submit" value="Add To Cart" name="submit">
</form>

@endsection
@extends('layouts.layout')
@section('content')
<h2>Auction</h2>


{{$auction->item->name}} <br>
{{$auction->item->description}}<br>
{{$auction->starting_amount}}<br>
{{$auction->item->quantity}}<br>
{{$auction->user->name}}<br>
@if($auction->started_at)
{{$auction->started_at->diffForHumans()}} <br>
@endif
@if($auction->ending_at)
{{$auction->ending_at->diffForHumans()}} <br>
@endif
@if($auction->duration)
{{$auction->duration}} <br>
@endif
<br>
{{
$auction->status}}<br>
<img src="{{asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="40px">
Current Highest Bid : <br>
<form action="" method="POST">
    <label for="amount">Bid Amount</label>
    <input type="text" name="amount"><br>
    <input type="checkbox" name="agree" > Agree to terms and conditions
    <input type="submit" name="submit" value="Enter Auction">
</form>

<form action="" method="POST">
    <label for="amount">New Bid Amount</label>
    <input type="text" name="amount"><br>
    <input type="submit" name="submit" value="Update Bid Amount">
</form>

<a href="">Quit auction</a>
@endsection
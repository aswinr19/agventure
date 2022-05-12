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

<form action="/auctions/new-bid" method="POST">
    @csrf
    <input type="hidden" name="auction_id" value="{{ $auction->id }}"><br>
    <label for="amount">Bid Amount</label>
    <input type="text" name="amount"><br>
    @error('amount'){{ $message }}@enderror <br>
    <input type="checkbox" name="agree" > Agree to terms and conditions <br>
    @error('agree'){{ $message }}@enderror <br> 
    <input type="submit" name="submit" value="Enter Auction">
</form>
@if(Session::get('success'))
<span class="successmsg">{{ Session::get('success')  }}</span>  
@endif
@if(Session::get('fail'))
<span class="errormsg">{{ Session::get('fail')  }}</span>
 @endif



@endsection
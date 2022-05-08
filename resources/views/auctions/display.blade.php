@extends('layouts.layout')
@section('content')
<h2>Auctions</h2> 
@if ($auctions->count())
@foreach($auctions as $auction)
<a href="/auctions/{{ $auction->id }}">
        {{
    $auction->item->name
        }} </a><br>
        {{
    $auction->item->description
}}<br>

        
            {{
                $auction->starting_amount
            }}<br>
        
            {{
                $auction->item->quantity
            }}<br>
        
            {{
                $auction->user->name

            }}<br>
        @if($auction->started_at)
            {{
                $auction->started_at->diffForHumans()
            }} <br>
            @endif
            @if($auction->ending_at)
            {{
                $auction->ending_at->diffForHumans()
            }} <br>
            @endif
            @if($auction->duration)
            {{
                $auction->duration
            }} <br>
            @endif
            <br>
                <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="20px">
                    <br> <br>
  
@endforeach
@else
    <p>No auctions yet. Please check back later.</p>
@endif
@endsection
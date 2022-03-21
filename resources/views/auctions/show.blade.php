@extends('layouts.layout')
@section('content')
<h2>Auction</h2>


        {{
    $auction->item->name
        }} <br>
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
            @if(  $auction->ending_at > \Carbon\Carbon::now())
            @if($auction->ending_at )
            {{
                $auction->ending_at->diffForHumans()
            }} 
            <br>
            @endif
            @if($auction->duration )
            {{
                $auction->duration
            }}
             <br>
            @endif
            @else <p>Ended  </p> 
            @endif
            <br>
                   {{
                $auction->status
            }}<br>
                <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="40px">

@endsection
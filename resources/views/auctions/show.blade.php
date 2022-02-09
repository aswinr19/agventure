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
        
            {{
                $auction->started_at
            }}<br>
                   {{
                $auction->status
            }}<br>
                <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="40px">

@endsection
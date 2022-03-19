@extends('layouts.layout')
@section('content')
<h2>Auctions</h2>
<table>
    <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Starting Price</th>
        <th>Quantity</th>
        <th>Created By</th>
        <th>Started At</th>
        <th>Status</th>
        <th>Image</th>
       
    </tr>
    
@foreach($auctions as $auction)

<tr>
   
<td>
<a href="/auction/{{ $auction->id }}">
        {{
    $auction->item->name
        }}</a>
        </td>

        
        <td>
        {{
    $auction->item->description
}}

        </td>
       
        <td>
            {{
                $auction->starting_amount
            }}
        </td>
        <td>
            {{
                $auction->item->quantity
            }}
        </td>
        <td>
            {{
                $auction->user->name

            }}
        </td>
      @if($auction->started_at)
      <td>
            {{
                $auction->started_at->diffForHumans()
            }}
        </td>
      @endif
        <td>
            {{
                $auction->status
            }}
        </td>
        <td>
        <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="40px">

        </td>
       
        
    </tr>
    
@endforeach
</table>
@endsection
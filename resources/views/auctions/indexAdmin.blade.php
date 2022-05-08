@extends('layouts.adminLayout')
@section('content')
<h2>Auctions</h2>
@if ($auctions->count())
<table>
    <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Starting Price</th>
        <th>Quantity</th>
        <th>Created By</th>
        <th>Status</th>
        <th>Image</th>
        <th>Approve</th>
        <th>Reject</th>
    </tr>
    
@foreach($auctions as $auction)

<tr>
   
<td>
<a href="/admin/auction/{{ $auction->id }}">
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
        <td>
            {{
                $auction->status
            }}
        </td>
        <td>
        <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="40px">

        </td>
        <td>
            <a href="/admin/auction/approve/{{ $auction-> id }}">Approve</a>
        </td>
        <td>
            <a href="/admin/auction/reject/{{ $auction-> id }}">Reject</a>
        </td>
        
    </tr>
    
@endforeach
</table>

@else
    <p>No products yet. Please check back later.</p>
@endif
@endsection
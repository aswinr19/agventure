@extends('layouts.layout')
@section('content')
<h2>Items</h2>
<table>
    <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Quantity</th>
        <th>Created By</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    
@foreach($items as $item)
@if($item->user_id == session('loggedUser'))
<tr>
   
<td>
<a href="/farmer/item/{{ $item->id }}">
        {{
    $item->name
        }}</a>
        </td>

        
        <td>
        {{
    $item->description
}}

        </td>
        <td>
            {{
                $item->quantity
            }}
        </td>
        <td>
            {{
                $item->user->name

            }}
        </td>
        <td>
        <img src="{{
           asset('images/'. $item->image)}}" alt="{{ $item->image }} " height="40px">

        </td>
        <td>
            <a href="/farmer/update-item/{{ $item-> id }}">Update</a>
        </td>
        <td>
            <a href="/farmer/delete-item/{{ $item-> id }}">Delete</a>
        </td>
        
    </tr>
    @endif
@endforeach
</table>
@endsection
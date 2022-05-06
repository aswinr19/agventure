@extends('layouts.layout')
@section('content')
<h2>Items</h2>
@if ($items->count())
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

@endforeach
</table>
<a href="/farmer/create-item">Add new item</a>
@else
<p>No items yet. Please check back later.</p>
<br>
<a href="/farmer/create-item">Add new item</a>
@endif
@endsection
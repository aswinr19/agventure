@extends('layouts.layout')
@section('content')
<h2>Machines</h2>
@if ($machines->count())
<table>
    <tr>
        <th>Machine Name</th>
        <th>Machine Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    

@foreach($machines as $machine)

<tr>
   
<td>
<a href="/admin/machine/{{ $machine->id }}">
        {{
    $machine->name
        }}</a>
        </td>

        
        <td>
        {{
    $machine->description
}}

        </td>
        <td>
        {{
    $machine->category->name
}}
        </td>
        <td>
            {{
                $machine->price
            }}
        </td>
        <td>
            {{
                $machine->quantity
            }}
        </td>
       
        <td>
        <img src="{{
    asset('images/'. $machine->image)
}}" alt="{{ $machine->image}} " height="40px">

        </td>
        <td>
            <a href="/admin/update-machine/{{ $machine-> id }}">Update</a>
        </td>
        <td>
            <a href="/admin/delete-machine/{{ $machine-> id }}">Delete</a>
        </td>
    </tr>
<p>
    <a href="/admin/create-machine">Add New Machine</a>
</p>
@endforeach
</table>
@else
<p>No products yet. Please check back later.</p>
<br><br>
<a href="/admin/create-machine">Add New Machine</a>
@endif
@endsection
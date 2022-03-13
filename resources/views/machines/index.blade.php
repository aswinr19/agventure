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
    $machine->category
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
            {{
                $machine->suitable_crops
            }}
        </td>
        <td>
            {{
                $machine->reccomended_crops
            }}
        </td>
        <td>
            {{
                $product->composition
            }}
        </td>machine
        <td>
        <img src="{{
    asset('images/'. $machine->image)
}}" alt="{{ $product->image }} " height="40px">

        </td>
        <td>
            <a href="/admin/update-machine/{{ $machine-> id }}">Update</a>
        </td>
        <td>
            <a href="/admin/delete-machine/{{ $machine-> id }}">Delete</a>
        </td>
    </tr>

@endforeach
</table>
@else
<p>No products yet. Please check back later.</p>
@endif
@endsection
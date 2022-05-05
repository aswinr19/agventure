@extends('layouts.adminLayout')
@section('content')
<h2></h2>
<div class="top"><h3>Machines</h3><a href="/admin/create-machine">Add New Machine</a></div>

@if ($machines->count())
<table class="table table-striped">
<thead>
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
    
    <thead>
@foreach($machines as $machine)
<tbody>
<tr>
   
<td scope="row"><a href="/admin/machine/{{ $machine->id }}">{{$machine->name}}</a></td>
        <td>{{$machine->description}}</td>
        <td>{{ $machine->category->name}}</td>
        <td>{{$machine->price}}</td>
        <td>{{$machine->quantity}}
        </td>   
        <td>
        <img src="{{ asset('images/'. $machine->image)}}" alt="{{ $machine->image}} " height="40px">
        </td>
        <td><a href="/admin/update-machine/{{ $machine-> id }}">Update</a> </td>
        <td> <a href="/admin/delete-machine/{{ $machine-> id }}">Delete</a></td>
    </tr>
    </tbody>
<!-- <p></p> -->
@endforeach
</table>
@else
<p>No products yet. Please check back later.</p>
<br><br>
<a href="/admin/create-machine">Add New Machine</a>
@endif
@endsection
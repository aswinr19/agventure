@extends('layouts.adminLayout')
@section('content')
<!-- <h2> Categories </h2> -->
<div class="top"><h3>Categories</h3><a href="/admin/create-category">Add new category</a></div>
@if ($categories->count())
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created By</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
<tbody>
@foreach($categories as $category)
<tr>
    <td scope="row">{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>{{ $category->user->name }}</td>
    <td><a href="/admin/update-category/{{ $category->id }}">Update</a></td>
    <td><a href="/admin/delete-category/{{ $category->id }}">Delete</a></td>

</tr>

@endforeach
</tbody>


</table>
@else
    <p>No categories yet. Please check back later.</p>
@endif
<br> 

@endsection
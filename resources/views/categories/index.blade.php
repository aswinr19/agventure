@extends('layouts.layout')
@section('content')
<h2> Categories </h2>
@if ($categories->count())
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created By</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
@foreach($categories as $category)
<tr>
    <td>{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>{{ $category->user->name }}</td>
    <td><a href="/admin/update-category/{{ $category->id }}">Update</a></td>
    <td><a href="/admin/delete-category/{{ $category->id }}">Delete</a></td>

</tr>

@endforeach


</table>
@else
    <p>No categories yet. Please check back later.</p>
@endif
<br> 
<a href="/admin/create-category">Add new category</a>
@endsection
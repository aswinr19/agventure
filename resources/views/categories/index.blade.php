@extends('layouts.layout')
@section('content')
<h2> Categories </h2>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
@foreach($categories as $category)
<tr>
    <td>{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td><a href="/admin/update-category/{id}">Update</a></td>
    <td><a href="/admin/delete-category/{id}">Delete</a></td>

</tr>

@endforeach
</table>
@endsection
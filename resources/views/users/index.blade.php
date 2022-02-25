@extends('layouts.layout')
@section('content')
<h2>Users</h2>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Role</th>
<th>Joined At</th>
</tr>
@foreach($users as $user)
<tr>
   <td> {{ $user->name }} </td>
   <td> {{ $user->email }} </td>
   <td> {{ $user->phone }} </td>
   <td> {{ $user->Role }} </td>
   <td> {{ $user->created_at }} </td>
</tr>
@endforeach
</table>
@endsection
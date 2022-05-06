@extends('layouts.adminLayout')
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
<a href="/profile/{{$user->id}}">
   <td> {{ $user->name }} </td>
</a>
   <td> {{ $user->email }} </td>
   <td> {{ $user->phone }} </td>
   <td> {{ $user->role }} </td>
   <td> {{ $user->created_at->diffForHumans() }} </td>
</tr>
@endforeach
</table>
@endsection
@extends('layouts.adminLayout')
@section('content')
<h2>Create Experts</h2>
<form action="/admin/create-expert" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" > <br>
    <label for="description">Description</label>
    <input type="text" name="description" > <br>
    <label for="designation">Designation</label>
    <input type="text" name="designation" > <br>
    <label for="email_id">Email Id</label>
    <input type="text" name="email_id" > <br>
    <label for="address">Address</label>
    <textarea name="address"  cols="30" rows="10"></textarea>
    <input type="submit" value="submit" name="submit">
</form>
@endsection
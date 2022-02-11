@extends('layouts.layout')
@section('content')
<h2>Update Complaints</h2>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $complaint->id }}">
    <label for="subject">Subject</label>
    <input type="text" name="subject"><br>
    <label for="complaint">Complaint</label>
    <input type="text" name="complaint" ><br>
    <label for="proof">Proof</label>
    <input type="file" name="proof"> <br>
    <input type="submit" value="submit" name="submit">
</form>
@endsection
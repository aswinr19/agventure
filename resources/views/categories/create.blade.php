@extends('layouts.adminLayout')
@section('content')


<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-left: 39%;margin-top: 128px;">
<h2 class="">Create Category</h2>
<form action="/admin/create-category" method="POST">
@csrf
<label for="name">Name</label><br>
<input type="text" class="form-control col-4" name="name"><br>
<span class="error-msg">@error('name') {{ $message }}@enderror</span>  <br>
<input type="submit" value="submit" class="btn btn-warning" name="submit">
</form>
</div>

@endsection
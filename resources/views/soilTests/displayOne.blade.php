@extends('layouts.layout')
@section('content')
<h2>Soil Test Appointment</h2>

{{ $test->user->name }} <br>
{{ $test->date }} <br>
{{ $test->time }} <br>
@if($purchase->count() > 0)
{{ $purchase->status }} <br>
{{ $purchase->order_status }} <br>
@endif
<br> <br>
@endsection
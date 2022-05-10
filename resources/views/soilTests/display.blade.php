@extends('layouts.layout')
@section('content')
<h2>Soil Test Appointments</h2>
@foreach($tests as $test)
<a href="/soil-test/appointments/{{ $test->id }}">
{{ $test->user->name }} <br>
{{ $test->date }} <br>
{{ $test->time }} <br>
</a>
<br> <br>
@endforeach
@endsection
@extends('layouts.layout')
@section('content')
<h2>Complaints</h2>
@foreach($complaints as $complaint)
@if($complaints->user_id == session('loggedUser'))
{{
    $complaint->subject;
}}
{{
    $complaint->complaint
}}
<img src="{{ asset('images/'.$complaint->proof)}}" alt="{{ $complaint->proof }}" height="40px">
@endif
@endforeach

@endsection
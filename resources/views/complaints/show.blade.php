@extends('layouts.layout')
@section('content')
<h2>Complaint</h2>
{{
    $complaint->subject;
}}
{{
    $complaint->complaint
}}
<img src="{{ asset('images/'.$complaint->proof)}}" alt="{{ $complaint->proof }}" height="100px">
@endsection
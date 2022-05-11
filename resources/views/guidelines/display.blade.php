@extends('layouts.layout')
@section('content')
<h2>Guidelines</h2>
@if($guidelines->count() > 0)
@foreach($guidelines as $guideline)
<a href="/guideline/{{ $guideline->id }}">
    <h4>{{
    $guideline->disease_name
}}
    </h4> <br>
</a>
<p>{{ $guideline->short_description }}</p> <br>
<img src="{{ asset('images/'. $guideline->image) }}"" alt=" {{ $guideline->disease_name }}" height="70px"><br>
@endforeach
@else
<p>No guidelines yet. Please check back later.</p>
@endif
@endsec
@endsection
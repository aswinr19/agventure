@extends('layouts.layout')
@section('content')
<h2>Guidelines</h2>
@foreach($guidelines as $guideline)
<h4>{{
    $guideline->disease_name
}}
</h4> <br>
<p>{{ $guideline->short_description }}</p> <br>
<img src="{{ asset('images/'. $guideline->image) }}"" alt="{{ $guideline->disease_name }}" height="70px"><br>
@endforeach
@endsection
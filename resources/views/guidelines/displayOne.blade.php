@extends('layouts.layout')
@section('content')
<h2>Guideline</h2>
<h4>{{
    $guideline->disease_name
}}
</h4> <br>
<p>{{ $guideline->short_description }}</p> <br>
<p>{{ $guideline->symptoms }}</p> <br>
<img src="{{ asset('images/'. $guideline->image) }}"" alt="{{ $guideline->disease_name }}" height="100px"><br>
@endsection
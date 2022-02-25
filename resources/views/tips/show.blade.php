@extends('layouts.layout')
@section('content')
<h2>Tip</h2>
<h3>{{ $tip->title }}</h3> <br>
<p>{{ $tip->description }}</p>
<iframe width="560" height="315" src="{{ $tip->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endsection
@extends('layouts.layout')
@section('content')
<h2>Tips</h2>
@foreach($tips as $tip)
<h3>{{$tip->title}}</h3>
<p>{{$tip->description}}</p>
<iframe width="560" height="315" src="{{ $tip->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endforeach
@endsection
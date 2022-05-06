@extends('layouts.adminLayout')
@section('content')
<h2>Expert</h2>

        {{ $expert->name }}
   
        {{ $expert->description }}
  
        {{ $expert->designation }}
  
        {{ $expert->email_id }}
   
        {{ $expert->address }}

@endsection
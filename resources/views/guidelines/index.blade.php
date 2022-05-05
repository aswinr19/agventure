@extends('layouts.adminLayout')
@section('content')
<h2>Guidelines</h2>
<table>
    <tr>
        <th>Desease Name</th>
        <th>Short Description</th>
        <th>Symptoms</th>
        <th>Image</th>
    </tr>
@foreach($guidelines as $guideline)
<tr>
    <td>
<h4>{{
    $guideline->disease_name
}}
</h4></td> 
<td>
<p>{{ $guideline->short_description }}</p></td> 
<td><img src="{{ asset('images/'. $guideline->image) }}"" alt="{{ $guideline->disease_name }}" height="70px"></td>
</tr>
@endforeach
</table>
@endsection
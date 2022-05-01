@extends('layouts.layout')
@section('content')
<h2>Experts</h2>
<table>
@foreach($experts as $expert)
<tr>
    <td>
        {{ $expert->name }}
    </td>

    <td>
        {{ $expert->description }}
    </td>

    <td>
        {{ $expert->designation }}
    </td>

    <td>
        {{ $expert->email_id }}
    </td>

    <td>
        {{ $expert->address }}
    </td>
</tr>
@endforeach
</table>
@endsection
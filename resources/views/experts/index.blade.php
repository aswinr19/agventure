@extends('layouts.adminLayout')
@section('content')
<h2>Experts</h2>
<table>
    <tr>
        <th>
            Name
        </th>

        <th>
            Description
        </th>

        <th>
            Designation
        </th>

        <th>
            Email Id
        </th>

        <th>
            Address
        </th>
    </tr>
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
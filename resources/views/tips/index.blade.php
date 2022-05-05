@extends('layouts.adminLayout')
@section('content')
<h2>Tips</h2>
<table>
    <tr>
        <th>
            Titile
        </th>
        <th>
            Description
        </th>
        <th>
            Url
        </th>
        <th>
            Created By
        </th>
        <th>
            Created At
        </th>
    </tr>
@foreach($tips as $tip)

<td>
<a href="/admin/tip/{{ $tip->id }}">
    {{ $tip->title }}
</a>
</td>

<td>
{{ $tip->description }}
</td>
<td>
    {{ $tip->url }}
</td>
<td>
    {{ $tip->user->name }}
</td>
<td>
    {{ $tip->created_at->diffForHumans() }}
</td>
@endforeach
</table>
@endsection
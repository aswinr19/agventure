@extends('layouts.layout')
@section('content')
<h2>Item</h2>
<p>
    {{
        $item->name
    }}
    <br>
    {{
        $item->description
    }}
    <br>
    {{
        $item->quantity
    }}<br>
    {{
                $item->user->user_name

            }} <br>
    {{
        $item->price
    }}<br>
    <img src="{{
    asset('images/'. $item->image)
}}" alt="{{ $item->image }} " height="80px">

<br>
</p>
@endsection
@extends('layouts.adminLayout')
@section('content')
<h2>Machine</h2>
<p>
    {{
        $machine->name
    }}
    <br>
    {{
        $machine->description
    }}
    <br>
    {{
        $machine->category->name
    }}<br>
    {{
        $machine->quantity
    }}<br>
    {{
        $machine->price
    }}<br>
    <img src="{{
    asset('images/'. $machine->image)
}}" alt="{{ $machine->image }} " height="80px">

@endsection
@extends('layouts.layout')
@section('content')
<h2>Orders</h2>
@foreach($orders as $order)
<div>

<a href="/orders/{{$order->id}}">{{ $order->id}}
{{$order->user->name}}</a>
@foreach($order->products as $product)
{{ $product->name}}
@endforeach
@foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach
{{ $order->total}}
{{ $order->status}}  
{{$order->order_status}}

</div>
@endforeach
@endsection
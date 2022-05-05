@extends('layouts.adminLayout')
@section('content')
<h2>Orders</h2>
@foreach($orders as $order)
<div>

<a href="/admin/orders/{{$order->id}}">{{ $order->id}}</a>
{{$order->user->name}}
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
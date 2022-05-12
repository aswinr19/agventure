@extends('layouts.layout')
@section('content')
<h2>Order</h2>
<p>
@foreach($order->products as $product)
{{ $product->name}}
@endforeach
@foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach
</p> 
   <br>
<p>
{{  $order->user->name }}
</p>
    <br>
<p>
{{$order->total}}
</p>
    <br>
<p>
{{$order->status}}
</p>
    <br>
<p>
{{$order->order_status}}
</p>
    <br>
<p>
   <a href="/orders/cancel-order/{{$order->id}}">Cancel</a>`       
</p>
</div>
@endsection
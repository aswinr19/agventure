@extends('layouts.adminLayout')
@section('content')
<div>
<p>
@foreach($order->products as $product)
{{ $product->name}}
@endforeach
@foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach
   </p> <br>
   <p>
     {{  $order->user->name}}
   </p><br>
   <p>
      {{ $order->total}}
   </p>
   <br>
   <p>
       {{$order->status}}
   </p><br>
   <p>
   {{$order->order_status}}
   </p>
   <p>
       @if($order->order_status=="ordered")
       <a href="/admin/orders/update/packed/{{$order->id}}">Packed</a>
       @endif
       @if($order->order_status=="packed")
       <a href="/admin/orders/update/shipped/{{$order->id}}">Shipped</a>
       @endif
       @if($order->order_status=="shipped")
       <a href="/admin/orders/update/delivered/{{$order->id}}">Delivered</a>
       @endif
   </p><br><br>
   <a href="/admin/orders/">Go back</a>

</div>
@endsection
@extends('layouts.layout')
@section('content')
<div>
<p>
       products
   </p> <br>
   <p>
       $order->user->name
   </p><br>
   <p>
       $order->totalAmount
   </p>
   <br>
   <p>
       $order->status
   </p><br>
   <p>
       $order->deliveryStatus
   </p>
   <p>
       <a href="/admin/orders/update/packed/{{$order->id}}">Packed</a>
       <a href="/admin/orders/update/shipped/{{$order->id}}">Shipped</a>
       <a href="/admin/orders/update/delivered/{{$order->id}}">Delivered</a>
   </p>
</div>
@endsection
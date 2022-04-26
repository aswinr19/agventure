@extends('layouts.layout')
@section('content')
<h2>Orders</h2>
@foreach($orders as $order)
<div>
   <a href="/admin/orders/{{$order->id}}">
       $order->id
   </a><br>
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
</div>
@endforeach
@endsection
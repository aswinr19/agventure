@extends('layouts.layout')
@extends('section')
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
       <a href="/orders/cancel-order/{{$order->id}}">Cancel</a>
       
   </p>
</div>
@endsection
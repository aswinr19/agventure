@extends('layouts.layout')

@section('content')
<h2>Checkout</h2>

<div>

<h5> Add New Address<button onclick="toggleAdressForm()"> + </button></h5>
<div id="address" style="display:none">
<form action="/checkout/create-address" method="POST">
  @csrf
    <label for="name">Full Name</label> <br>
    <input type="text" name="name"><br>
    <span>@error('name') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="phone">Phone</label> <br>
    <input type="text" name="phone"><br>
    <span>@error('phone') 
        
        {{ $message }}
    
        @enderror</span> <br>
    <label for="house_name">House Name</label> <br>
    <input type="text" name="house_name"><br>
    <span>@error('house_name') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="street">Street</label> <br>
        <input type="text" name="street"><br>
        <span>@error('street') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="pincode">Pincode</label> <br>
        <input type="text" name="pincode"><br>
        <span>@error('pincode') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="city">City</label> <br>
        <input type="text" name="city"><br>
        <span>@error('city') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="district">District</label> <br>
        <input type="text" name="district"><br>
        <span>@error('district') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <label for="state">State</label> <br>
        <input type="text" name="state"><br>
        <span>@error('state') 
        
        {{ $message }}
    
        @enderror</span> <br>
        <input type="submit" value="add" name="submit">
</form>
</div>
<br><br>


<form action="/checkout" method="POST">
@csrf

<!-- @if(Session::get('success'))
<input type="hidden" name="auction_id" value="{{ Session::get('auctionId') }}">
@endif -->

<h4>Select address</h4> <br>
    @foreach($addresses as $address)
    <input type="radio" name="selected_address" value="{{ $address->id }}" >  <span>{{ $address->name}},{{ $address->phone}}, {{ $address->house_name}},
        {{ $address->street}},{{ $address->city}},{{ $address->district }},{{ $address->state }},
        {{ $address->pincode }}. 
        <!-- <a href="/checkout/update-address/{{$address->id}}">Edit</a>  -->
        <a href="/checkout/delete-address/{{$address->id}}">Delete</a></span> <br>
    @endforeach
    <span>@error('selected_address') 
        
        {{ $message }}
    
        @enderror</span> <br>
</div>


<label for="payment_method">Payment Method</label><br>
<input  type="radio" name="payment_method" value="card" onclick="displayPaymentForm()">Credit/Debit/ATM Card<br>
<input  type="radio" name="payment_method" value="cod" onclick="hidePaymentForm()">COD<br>
<div id="payment" style="display:none">


<h5>Add Payment Details</h5>
<label for="card_number">Card Number</label> <br>
<input type="text" name="card_number" > <br>
<span>@error('card_number') 
        
        {{ $message }}
    
        @enderror</span> <br>
<label for="expiry_month">Expiry Month</label> <br>
<input type="text" name="expiry_month"><br>
<span>@error('expiry_month') 
        
        {{ $message }}
    
        @enderror</span> <br>
<label for="expiry_year">Expiry Year</label> <br>
<input type="text" name="expiry_year"><br>
<span>@error('expiry_year') 
        
        {{ $message }}
    
        @enderror</span> <br>
<label for="cvv">CVV</label> <br>
<input type="password" name="cvv"><br>
<span>@error('cvv') 
        
        {{ $message }}
    
        @enderror</span> <br>
</div>
<input type="submit" value="PROCEED" name="submit">
</form>

@if(Session::has('stripe_error'))
<p>{{ Session::get('stripe_error')}}</p>
@endif

<script>
    
  function toggleAdressForm() {
  var x = document.getElementById("address");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function displayPaymentForm() {
  var x = document.getElementById("payment");
  if (x.style.display === "none") {
    x.style.display = "block";
  }
}
function hidePaymentForm() {
  var x = document.getElementById("payment");
  if (x.style.display != "none") {
    x.style.display = "none";
  }
}

</script>
@endsection

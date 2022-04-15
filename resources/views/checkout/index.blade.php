@extends('layouts.layout')

@section('content')
<h2>Checkout</h2>
<div>
    @foreach($addresses as $address)
    <input type="radio" name="selected_address" >  <span>{{ $address->name}},{{ $address->phone}}, {{ $address->house_name}},
        {{ $address->street}},{{ $address->city}},{{ $address->district }},{{ $address->state }},
        {{ $address->pincode }}. <a href="/checkout/update-address">Edit</a> <a href="/checkout/delete-address">Delete</a></span>
    @endforeach
</div>

<h5>Add New Address</h5>
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

<div>
    @foreach($paymentDetails as $paymentDetail)
    <input type="radio" name="selected_card" > 
    <span> {{ $paymentDetail->card_number}}</span>
    @endforeach
</div>



<form action="/checkout/create-payment-details" method="POST">
@csrf
<label for="payment_method">Payment Method</label><br>
Credit/Debit/ATM Card
<input type="radio" name="payment_method" value="card">
COD
<h5>Add Payment Details</h5>
<input type="radio" name="payment_method" value="cod"><br>
<label for="card_number">Card Number</label> <br>
<input type="text" name="card_number" > <br>
<label for="cvv">CVV</label> <br>
<input type="password" name="cvv"><br>
<label for="valid_through">Expiry Month</label> <br>
<input type="text" name="expiry_month"><br>
<label for="valid_through">Expiry Year</label> <br>
<input type="text" name="expiry_year"><br>
<input type="submit" value="add" name="submit">
</form>

<form action="/checkout" method="POST">
@csrf
    <input type="hidden" name="user_id" value="{{}}">
    <input type="hidden" name="address_id" value="{{}}">
    <input type="hidden" name="" name="payment_id" value="{{}}">
    <input type="submit" value="continue" name="submit">
    @if(Session::has('stripe_error'))
    <span>{{ Session::get('stripe_error') }}</span>
    @endif
</form>

@endsection

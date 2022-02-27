@extends('layouts.layout')

@section('content')
<h2>Checkout</h2>
<div>
    @foreach($addresses as $address)
    <input type="radio" name="{{ $address->id }}" >  <span>{{ $address->name}},{{ $address->phone}}, {{ $address->house_name}},
        {{ $address->street}},{{ $address->city}},{{ $address->district }},{{ $address->state }},
        {{ $address->pincode }}. </span>
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
    <span> {{ $paymentDetail->card_number}} {{ $paymentDetail->upi_id }}</span>
    @endforeach
</div>
<h5>Add Payment Details</h5>
<form action="/checkout/create-payment-details" method="POST">
@csrf
<label for="payment_method">Payment Method</label><br>
Credit/Debit/ATM Card
<input type="radio" name="payment_method" value="card">
UPI
<input type="radio" name="payment_method" value="upi">
COD
<input type="radio" name="payment_method" value="cod"><br>
<label for="card_number">Card Number</label> <br>
<input type="text" name="card_number" > <br>
<label for="cvv">CVV</label> <br>
<input type="text" name="cvv"><br>
<label for="valid_through">Valid Through</label> <br>
<input type="text" name="valid_through"><br>
<label for="upi_id"> UPI Id</label><br>
<input type="text" name="upi_id"> <br>
<input type="submit" value="add" name="submit">
</form>
<form action="/checkout" method="POST">
@csrf
    <input type="hidden" name="user_id" value="{{}}">
    <input type="hidden" name="address_id" value="{{}}">
    <input type="hidden" name="" name="payment_id" value="{{}}">
    <input type="submit" value="continue" name="submit">
</form>
@endsection



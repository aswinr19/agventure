@extends('layouts.layout')
@section('content')
<h2>Create Soil Tests</h2>
<form action="/soil-test/create-soil-test" action="POST">
    <label for="month">Select a month</label>
    <select name="month" >
    <option value="1">JAN</option>
    <option value="2">FEB</option>
    <option value="3">MAR</option>
    <option value="4">APR</option>
    <option value="5">MAY</option>
    <option value="6">JUN</option>
    <option value="7">JUL</option>
    <option value="8">AUG</option>
    <option value="9">SEP</option>
    <option value="10">OCT</option>
    <option value="11">NOV</option>
    <option value="12">DEC</option>
    </select>
@error('month'){{ $message }}@enderror <br>
<label for="date">Select a date</label>
<select name="date" >
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="21">31</option>
</select>
@error('date'){{ $message }}@enderror <br>
<label for="time">Select a date</label>
<select name="time" >
    <option value="10">10.00AM</option>
    <option value="11">11.00AM</option>
    <option value="12">12.00AM</option>
    <option value="2">2.00PM</option>
    <option value="3">3.00PM</option>
    <option value="4">4.00PM</option>
</select>
@error('time'){{ $message }}@enderror <br>
</form>
@php
$total = 1200 ;
@endphp
<form action="/soil-test/proceed-to-pay" method="POST">
<p>Amount : 1200</p>
<input type="checkbox" name="agree" > Agree to terms and conditions <br>
@error('agree'){{ $message }}@enderror <br>
<input type="hidden" name="total" value="{{ $total }}">
<input type="submit" value="submit" name="submit">
</form>
@endsection

@extends('layouts.layout')
@section('content')
<h2>Expert</h2>

        {{ $expert->name }}
   
        {{ $expert->description }}
  
        {{ $expert->designation }}
  
        {{ $expert->email_id }}
   
        {{ $expert->address }}

        <button>Book Appointment</button>
        <form action="" method="POST">
            @csrf
            date <br>
            time
            <input type="submit" value="submit" name="submit">
        </form>
   
@endsection
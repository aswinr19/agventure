<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&display=swap" rel="stylesheet"> 
        <title>{{$title}}</title>
<style>   

 body {
    font-family: 'Montserrat', sans-serif;
    font-family: 'Quicksand', sans-serif;
}  
    
img .d-block.w-100 {
    height: 500px;
}
.img-with-text {
    padding: 0px 33px;
    margin-top: 15px;
    text-align: center;
}
.head{
    color:#f35121;  
}
.redbtn{
    background:#f35121;
}
.top-nav-bar{
    padding: 0px 0px 15px 0px;
    display: flex;
    margin-bottom: 0px;
    background-color: #f2f2f2;
  
            }
.categoryImag{
    width: 20px;
    height: 20px;
}
.searchBox{
    /* border-radius: 6px; */
    margin-top: 28px;
    width: 196px;
    padding: 3px;
    border: none;
    border-bottom:1px solid black;
    outline: none;
    background-color: #f2f2f2;
}

#list-elements{
    text-decoration: none;
    color: black;
    flex: 1;
    border-radius: 7px;
    font-size: 17px;
    padding: 8px;
}

.footer{
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #b2b2b2;
} 
    </style>
    </head>

    <body class="content">
        <ul class="top-nav-bar">
            <a id="list-elements"href="/"><h3>Agventure</h3></a>            
            <div class="img-with-text">
                <a href="/products?category=1">
            <img class="categoryImag"src="{{ asset('farming-black.png') }}   " alt="seeds" /> </a>
    <br>
    <a id="list-elements"href="/products?category=1"  class="categoryname">Seeds </a>
</div>
            <div class="img-with-text">
            <a href="/products?category=2">
    <img class="categoryImag"src="{{ asset('fertilizer-black.png') }}   " alt="fertilizers" /> </a>
    <br>
    <a id="list-elements"href="/products?category=2"  class="categoryname">Fertilizers </a>
</div>
            <div class="img-with-text">
            <a href="/products?category=2">
    <img class="categoryImag"src="{{ asset('pesticide-black.png') }}   " alt="pesticides" /> </a>
    <br>
   <a id="list-elements"href="/products?category=3" class="categoryname">Pesticides </a>
</div>
<div class="img-with-text">
<a href="/machines">
    <img class="categoryImag"src=" {{ asset('tractor-black.png') }}  " alt="machines" /></a> <br>
    <a id="list-elements"href="/machines"  class="categoryname">Machines</a>
</div>

           

<form action="/products" method="GET">
            
            <input type="text" class="searchBox" name="search" 
            placeholder="Search..."
            value="{{ request('search') }}">
            <!-- <img class="searchimg"src="{{ asset('assets/search.png') }}    " alt="search"> -->
           </form>
            @if(Session::get('loggedUser'))
            <div class="img-with-text">
                <a href="/cart">
             <img class="categoryImag"src="{{ asset('shopping-cart-black.png') }}   " alt="cart" /> 
             </a>
        <br>
        <!-- <a id="list-elements"href="/cart"  class="categoryname">Cart </p> -->
        </div>
            
<!-- dropdown menu         -->
<div class="dropdown">
  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    Other
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Auctions</a></li>
    <li><a class="dropdown-item" href="#">Complaints</a></li>
    <li><a class="dropdown-item" href="#">Guidelines</a></li>
    <li><a class="dropdown-item" href="#">Tips</a></li>

</ul>
</div>      
<!-- dropdown menu         -->

            <a id="list-elements" href="/auth/logout">Logout</a>
                @else
                <div class="img-with-text" style="margin-top: 31px;">
    <a href="/auth/signin" tyle="color: white;" id="list-elements">Signin</a>
</div>
            @endif
        </ul>
    @yield('content')
    <footer class="footer">
      
       <span class="footer-content">&copy;Agventure</span>
     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    </footer>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">

            }
            img.d-block.w-100 {
    height: 358px;
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
                /* background: #6bd757; */
                /* background:#f35121; */
                margin-bottom: 0px;

            }
     
            #list-elements {
                text-decoration: none;
    color: black;
    flex: 1;
    border-radius: 7px;
    font-width: 17px;
    /* font-size: 3px; */
    padding: 8px;
            }

           
           
   </style>
    </head>
   
    <body class="content">
        <ul class="top-nav-bar">
            <a id="list-elements"href="/"><img class="logo" src="{{ asset('assets/aa.jpg') }}" alt="logo"></a>
            <!-- <a id="list-elements"href="/products?category=1"> Seeds </a>  -->
            
            <div class="img-with-text">
            <img class="categoryImag"src="{{ asset('assets/farming.png') }}   " alt="sometext" /> 
    <!-- <img class="categoryImag"src="{{ asset('assets/seeds.png') }}  " alt="sometext" />  -->
    <br>
    <a id="list-elements"href="/products?category=1"  class="categoryname">Seeds </a>
</div>
            <!-- <img src="assets/fertilizer.png" alt="fertilizer">  -->
            <div class="img-with-text">
    <!-- <img class="categoryImag"src="{{ asset('assets/fertilizer1.png') }}   " alt="sometext" />  -->
    <img class="categoryImag"src="{{ asset('assets/fertilizer.png') }}   " alt="sometext" /> 
    <br>
    <a id="list-elements"href="/products?category=2"  class="categoryname">Fertilizers </a>
</div>
            <!-- <a id="list-elements"href="/products?category=2"> Fertilizers </a>     -->
            <!-- <a id="list-elements"href="/products?category=3"> Pesticides</a>     -->
            <div class="img-with-text">
    <!-- <img class="categoryImag"src="{{ asset('assets/peptizide.png') }}   " alt="sometext" />  -->
    <img class="categoryImag"src="{{ asset('assets/pesticide.png') }}   " alt="sometext" /> 
    <br>
   <a id="list-elements"href="/products?category=3" class="categoryname">Pesticides </a>
</div>
<!-- machine -->
<div class="img-with-text">
    <img class="categoryImag"src=" {{ asset('assets/tractor.png') }}  " alt="sometext" /> <br>
    <a id="list-elements"href="/machines"  class="categoryname">Machines</a>
</div>
            <!-- <a id="list-elements"href="/machines"> Machines </a> -->
           

<form action="/products" method="GET">
            
            <input type="text" class="searchBox"name="search" 
            placeholder="Search..."
            value="{{ request('search') }}"
            ><img class="searchimg"src="{{ asset('assets/search.png') }}    " alt="search">
           </form>
            @if(Session::get('loggedUser'))

            Welocme , user {{ Session::get('loggedUser') }}
            <a id="list-elements" href="/auth/logout">Logout</a>
                @else
                <div class="img-with-text" style="margin-top: 31px;">
    <!-- <img class="categoryImag"src="assets/cart.png" alt="sometext" /> <br> -->
    <!-- <a id="list-elements"href="/cart"  class="categoryname">Cart </p> -->
    <a href="/auth/signin"  class="btn btn-dark"style="color: white;"class="categoryname" 
    id="list-elements">Signin</a>
</div>
                
            @endif
           
        </ul>
    <!-- </nav> -->
    @yield('content')
    <footer class="top-nav-bar">
       <span class="footer-content">@Agventure</span>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    </footer>
    </body>
</html>

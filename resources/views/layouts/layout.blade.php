<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <title>{{$title}}</title>
        <style>  
        .errormsg{
    color:red;
  }   
  .success{
    color:green;   
  }  
            *{
                padding:0px;
                margin:0px;
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
<<<<<<< HEAD
.footer-content{
    text-align: center;
    margin-left: 50%;
    padding: 9px;
}
.registrationContainer{
    width: 350px;
    position: fixed;
    right: 41%;
    top: 23%;
    background: #fff;
    z-index: 12;
    box-shadow: 0 0 15px rgb(0 0 0 / 18%);

  }  
  .textboxstyle{
    outline: none;
    border: 1px solid gray;
    border-radius: 3px;
    width: 87%;
    margin-left: 19px;
    /* padding-left: 3px; */
    padding: 3px;
  }
 .button{
    padding: 6px 13px;
    color: #fff;
    background: #f35121;
    border-radius: 0;
    border: none;
    transition: 0.3s;
    margin-left: 35%;
  }
            /* .img-with-text {
    text-align: justify;
    width: [width of img];
}

.img-with-text img {
    display: block;
    margin: 0 auto;
} */
.categoryImag{
    width: 25px;
    height: 25px;
}
.categoryname{
    color:white;
}
.searchBox{
    /* border-radius: 6px; */
    margin-top: 28px;
    width: 196px;
    padding: 3px;
    border: none;
    border-bottom:1px solid black;

    outline: none;
}
.searchimg{
    width: 2px;
    margin-left: -28px;
}
.logo{
    width:150px;
    height:50px;
}
=======
           
            
            
>>>>>>> 7be3d7a5f3046787601566a02a994397c8e11329
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
<<<<<<< HEAD
            <div class="img-with-text">
    <!-- <img class="categoryImag"src="{{ asset('assets/cart.png') }}   " alt="sometext" />  -->
    <img class="categoryImag"src="{{ asset('assets/shopping-cart.png') }}   " alt="sometext" /> 

    
    <br>
    <a id="list-elements"href="/cart"  class="categoryname">Cart </p>
</div>
=======
            <a href="/cart">
            Cart
            </a>
>>>>>>> 7be3d7a5f3046787601566a02a994397c8e11329
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

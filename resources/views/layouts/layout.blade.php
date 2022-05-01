<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&display=swap" rel="stylesheet"> 
        <title>{{$title}}</title>
        <style>
        body {

            font-family: 'Montserrat', sans-serif;
            font-family: 'Quicksand', sans-serif;
            
            }
            nav,ul{
                display: flex;
                
            }
            li{
                justify-content: space-between;
                list-style: none;
            }
           
            
            
   </style>
    </head>
   
    <body class="content">
    <nav>
        <h2>
            <a href="/">Agventure</a>
        </h2>
        <ul>
            <a href="/products?category=1">  <li>Seeds</li> </a>  
            <a href="/products?category=2"> <li>Fertilizers</li> </a>    
            <a href="/products?category=3"> <li>Pesticides</li> </a>    
            <a href="/machines">  <li>Machines</li> </a>
            <form action="/products" method="GET">
            
            <input type="text" name="search" 
            placeholder="Find something"
            value="{{ request('search') }}"
            >
           </form>
            @if(Session::get('loggedUser'))
            <a href="/cart">
            Cart
            </a>
            Welocme , user {{ Session::get('loggedUser') }}
            <a href="/auth/logout">Logout</a>
                @else
                <a href="/auth/signup">
                Signup
                </a>
                <a href="/auth/signin">
                Signin
                </a>
            @endif
           
        </ul>
    </nav>
    @yield('content')
    <footer>
        <div>
            &copy; Agventure
        </div>
    </footer>
    </body>
</html>

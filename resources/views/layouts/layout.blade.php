<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">
        <title>{{$title}}</title>
        <style>
        body {
            font-family: "sans-serif";
    
            }
            nav,ul{
                display: flex;
                
            }
            li{
                justify-content: space-between;
                list-style: none;
            }
            div{
               font-size: 16px;
                background-color:grey;
            }
            
            
   </style>
    </head>
   
    <body class="content">
    <nav>
        <h2>
            <a href="/">Agventure</a>
        </h2>
        <ul>
            <a href="">  <li>Seeds</li> </a>  
            <a href=""> <li>Fertilizers</li> </a>    
            <a href=""> <li>Pesticides</li> </a>    
            <a href="">  <li>Machines</li> </a>
            <form action="/products" method="GET">
            @csrf
            <input type="text" name="search" 
            placeholder="Find something"
            value="{{ request('search') }}"
            >
           </form>
            <a href="/cart">
            Cart
            </a>
            @if(Session::get('loggedUser'))
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
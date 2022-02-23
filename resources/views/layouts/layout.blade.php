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
            
   </style>
    </head>
    <nav>
        <h2>Agventure</h2>
        <ul>
            <a href="">  <li>Seeds</li> </a>    <a href=""> <li>Fertilizers</li>  </a>    <a href=""> <li>Pesticides</li> </a>    <a href="">  <li>Machines</li> </a>
           
           
            
           
            <form action="/products" method="GET">
            <input type="text" name="search" 
            placeholder="Find something"
            value="{{ request('search') }}"
            >
            </form
        </ul>
    </nav>
    <body class="content">
    @yield('content')
    </body>
</html>
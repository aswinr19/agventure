<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title>
        <style>
        body {
            font-family: "sans-serif";
    
            }
            
   </style>
    </head>
    <body >
    @yield('content')
    </body>
</html>
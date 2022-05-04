<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin:0px;
        padding:0px
    }
    .top-navbar{
        background-color: black;
        width:100%;
        /* height: 77px; */
        padding: 19px 74px;
        display:flex;
        /* color:white; */
    }
    .top-navbar a{
        color:white;
        text-decoration: none;
        /* margin: 21px 0px 0px 49px; */
    }
    .left{
        flex: .3;
        color:white;
    }
    .right{
        flex:.7;
    }
    .right a{
        padding: 0px 30px;
    }
    .top{
        display: flex;
background-color: #f9f5f5;
padding: 21px;
margin: 56px;
    }
    .top h3 {
  flex: .9;
}
    /* .side-bar{
        
        width: 20%;
  background: black;
  height: 1000px;
  display: flex;
  flex-direction: column;
} */
    
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<body>
    <!-- <h1>adminlayout</h1> -->
    <div class="top-navbar">
       
        <div class="left"><a href="/admin">Agventure</a>  </div>
        <div class="right">
        <a href="/admin/products">View Poducts</a>
    <a href="/admin/machines">View Machines</a>
    <a href="/admin/categories">View Categories</a>
    <a href="/admin/categories">View Categories</a>
</div>
    
    </div>
    <div class="content">
    @yield('content')
    </div>
   
</body>
</html>
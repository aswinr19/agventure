@extends('layouts.layout')
@section('content')

<style>
 .product-name {
    font-weight: 600;
    font-size: 13px;
    color: #333;
}
.products-grid .price-box{
    color: #3C8031 !important;
    font-weight: 600;
    font-size: 13px;
}
.price-box .old-price {
    margin: 0;
    color: #ccc;
    float: left;
    font-weight: 600;
}
 .short-desc {
    height: 40px;
    overflow: hidden;
    color: #666;
    font-size: 12px;
}
</style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src=" {{ asset('img1.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('img2.jpg') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('img3.jpg') }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<center style="padding: 18px 0px 0px 0px;">
  <h1>Popular Products</h1>
</center>

<div class="row" style="padding: 29px;">
 
   <!-- ------------------- -->
  <div class="col-sm-3" style="padding: 18px 30px 11px 45px;">
  <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8H9Fk15ekcRMOhbZEERzQK32CENUnnQKFUldVjyDGlh25WJSQ-eXtwZbq-ERmWxd0v74&usqp=CAU" style="height:159px;"alt="Card image cap">
  <div class="card-body" style="padding:.8rem">
    <p class="card-text">
    <div class="product-shop">
<h3 class="product-name" itemprop="name">Product Name</h3>
<div class="price-box">
<p class="old-price">
<span class="price">
<span><span class="price">₹275.00</span></span>
<span class="strike-through"></span>
</span>
<span class="label-price">/500g</span>
</p>
<p class="special-price">
<span class="price">
<span><span class="price">₹139.00</span></span>
</span>
<span class="label-price">/500g</span>
</p>
</div>
<div class="short-desc ellipsis-text">One of the good product buy one get one free...</div>

</div>
    </p>
  </div>
</div>
  </div>

  
 
</div>

@endsection

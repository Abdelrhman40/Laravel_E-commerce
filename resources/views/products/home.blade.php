@extends('navbar.navbar')
@section('content')
<div class="card bg-dark text-white border-0 ch" >
    <img src="{{ asset("images/background1.jpg") }}" class="card-img h-100 rounded-0" alt="Background" />
    <div class="card-img-overlay d-flex flex-column justify-content-center" >
        <div class="container">
        <h5 class="card-title fw-bolder display-3 mb-0">NEW SEASON ARRIVALS</h5>
        <p class="card-text fs-2 lead">CHECK OUT ALL THE TRENDS</p>

        </div>
    </div>
</div>
<div class="buttons d-flex justify-content-center my-5 pb-5">
    <a href="{{ url('/filter/*') }}"><div class="btn btn-outline-dark me-2">All</div></a>
    <a href="{{ url('/filter/1') }}"><div class="btn btn-outline-dark me-2">Men's Clothing</div></a>
    <a href="{{ url('/filter/2') }}"><div class="btn btn-outline-dark me-2">Women's Clothing</div></a>
    <a href="{{ url('/filter/3') }}"><div class="btn btn-outline-dark me-2">Jewelery</div></a>
    <a href="{{ url('/filter/4') }}"><div class="btn btn-outline-dark me-2">Elctronic</div></a>
</div>

@include('products.productsExtend')

@endsection

@extends('navbar.navbar')
@section('content')
<div class="container my-2 py-5">
    <div class="row">
        <div class="col-12 mb-5">
            <h1 class=' display-6 fw-bolder text-center'>Latest Product</h1>
            <hr />
        </div>
    </div>

<div class="buttons d-flex justify-content-center my-3 pb-5">
    <a href="{{ url('/filter/*') }}"><div class="btn btn-outline-dark me-2">All</div></a>
    <a href="{{ url('/filter/1') }}"><div class="btn btn-outline-dark me-2">Men's Clothing</div></a>
    <a href="{{ url('/filter/2') }}"><div class="btn btn-outline-dark me-2">Women's Clothing</div></a>
    <a href="{{ url('/filter/3') }}"><div class="btn btn-outline-dark me-2">Jewelery</div></a>
    <a href="{{ url('/filter/4') }}"><div class="btn btn-outline-dark me-2">Elctronic</div></a>
</div>

@include('products.productsExtend')
@endsection


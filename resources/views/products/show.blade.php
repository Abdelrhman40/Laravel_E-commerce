@extends('navbar.navbar')
@section('content')
<div class="container">
    <div class="row my-2">

        <div class="col-md-4" >
          <div>
            <img class="w-100" height={500} src="{{ asset("storage/$product->image") }}" />
          </div>
          </div>
          <div class="col-md-7 ">
            <div class="mt-5">
            <h4 class=' text-black-50 text-uppercase'>{{ $product->category->category_name }}</h4>
            <h1 class=' display-5'>{{ $product->title }}</h1>
            <p class=' lead fw-bolder'>
              Rating {{ $product->rate }}
            </p>
            <h3 class=' fw-bold my-4 display-6'> $ {{$product->price}}</h3>
            <p class="lead">{{ $product->desc }}</p>
            <div class="d-flex">
                <form action="{{ url("/addcart/$product->id") }}" method="POST">
                    @csrf
                    <button type="submit" class='btn btn-outline-dark px-4 py-2'  >Add to cart</button>
                </form>
                <a href="{{ url('/gotocart') }}" class='btn btn-dark px-3 py-2 ms-2'>go to cart</a>
            </div>
            <div class="my-2"> {{ $qrcode }} </div>
            </div>
          </div>

      </div>
</div>
@endsection

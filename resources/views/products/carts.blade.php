@extends('navbar.navbar')
@section('content')
<div class=''>
    <div class="container mx-auto my-5">
       <h3>number of products in order :{{ $numOfProduct }}</h3>
       <div class="row p-4 ">
        @foreach ($products as $product )
                <div class="col-md-5 bg-light bg-gradient my-2">
                    <img src="{{ asset("/storage/$product->image") }}" alt="{{ $product->title }}" class='w-75 p-2 px-4'  height="180px" />
                </div>
                <div class="col-md-5 bg-light bg-gradient my-2">
                    <h5>{{ $product->title }}</h5>
                    <h5>$ {{ $product->price }}</h5>
                    <div>
                        <form action="{{ url("/deletecart/$product->id") }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-3">delete cart</button>
                        </form>
                    </div>
                </div>

           @endforeach
       </div>
       <h4>total price is : $ {{ $totalPrice }}</h4>

    </div>
 </div>
@endsection

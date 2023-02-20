@extends('navbar.navbar')
@section('content')
<div class="container">
    <div class="row my-2">
        @include('success')

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
            <a href="{{  url("/edit/$product->id")  }}"  class='btn btn-outline-primary px-4 py-2'  >update</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">delete</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure delete {{ $product->title }}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="{{ url("/delete/$product->id") }}" method="post">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
</div>
@endsection

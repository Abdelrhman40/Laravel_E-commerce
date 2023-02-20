@extends('layout')
@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 ">
    <div class="container">
      <a class="navbar-brand font-weight-bolder" href="{{ url('/home') }}">LA collaction </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

            @auth()

          <li class="nav-item cursor-pointer">
            <a class="nav-link active cursor-pointer" aria-current="page" href="{{ url('/home') }}">Home</a>
          </li>
          <li class="nav-item cursor-pointer">
            <a class="nav-link active cursor-pointer" aria-current="page"  href="{{ url('/products') }}">Products</a>
          </li>
          <li class="nav-item cursor-pointer">
            <a class="nav-link active cursor-pointer" aria-current="page" href="" >About</a>
          </li>
          <li class="nav-item cursor-pointer">
            <a class="nav-link active cursor-pointer" aria-current="page" href="" >Contact</a>
          </li>
          @endauth


        </ul>
        <div class="buttons d-flex">
            @auth
                @if (Auth::user()->role == "admin")
                    <a  class='btn btn-outline-dark ms-2' href="{{ url('adminPage') }}">Admin page</a>
                @endif
                    <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                        <button  class='btn btn-outline-dark ms-2' >Log Out</button>
                    </form>
                    <a href="{{ url('/gotocart') }}" class='btn btn-outline-dark ms-2'> <i class="fa-solid fa-cart-shopping me-1"></i> carts </a>
          @endauth
          @guest
          <a  class='btn btn-outline-dark' href='/login'> <i class="fa-solid fa-right-to-bracket me-1"></i> Login</a>
          <a  class='btn btn-outline-dark ms-2' href='/register'> <i class="fa-solid fa-user-plus me-1"></i> Register</a>
          @endguest
        </div>
      </div>
    </div>
    </nav>
@endsection

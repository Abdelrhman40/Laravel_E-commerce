<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
    @yield('navbar')
    {{--  @guest
        <a href="{{ route('register') }}">register</a>
        <a href="{{ route('login') }}">login</a>
    @endguest
    @auth
        <form action="{{url('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">logout</button>
        </form>
    @endauth  --}}
    @yield('content')
    @yield('products')
    @yield('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

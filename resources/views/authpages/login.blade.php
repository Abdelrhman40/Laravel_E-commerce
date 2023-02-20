@extends('navbar.navbar')
@section('content')

<div>

    <div class='container my-3 m-auto w-75'>
        <div class="w-75 m-auto">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
        <h2 class='my-3'>Login Form</h2>
        <form action="{{ url('/login') }}" method="post" >
            @csrf
            <label> email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class='form-control my-3' />
            <label> password :</label>
            <input type="password" name="password" value="{{ old('password') }}" class='form-control my-3' />
            <button type="submit"  class='btn btn-outline-info'>Login</button>
        </form>
        </div>
    </div>

</div>

@endsection

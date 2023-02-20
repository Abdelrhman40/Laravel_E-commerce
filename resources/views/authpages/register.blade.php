@extends('navbar.navbar')
@section('content')

<div>

    <div class='container my-3 m-auto w-75'>
        <div class="w-75 m-auto">
        <h2 class='my-3'>Registeration Form</h2>
        <form action="{{ url('/register') }}" method="POST" >
            @csrf
            <label> name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class='form-control my-3' />
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <label> email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class='form-control my-3' />
            @error('email')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <label> password :</label>
            <input type="password" name="password" value="{{ old('password') }}" class='form-control my-3' />
            @error('password')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <label> password confirmation:</label>
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class='form-control my-3' />
            @error('password')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <button type="submit" class='btn btn-outline-info'>Register</button>
        </form>
    </div>
    </div>

</div>

@endsection

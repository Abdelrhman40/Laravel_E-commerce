@extends('navbar.navbar')
@section('content')
<div class="container my-5 w-75">

    <div >
        <div class="d-flex justify-content-between">
            <h2>all products</h2>
            <a href="{{ url('/create') }}" class="btn btn-success" >add new Product</a>
        </div>
        <div>
        <hr>
        </div>
    </div>

</div>
<div class=" w-75 py-3 mx-auto">
    @if(session()->has("success"))
        <div class="alert alert-success">{{session()->get("success")}}</div>
    @endif
    <table class="table">
        <thead>
            <th>image</th>
            <th>title</th>
            <th>actions</th>
            <th>actions</th>
        </thead>
         <tbody id="tableRow">
            @foreach ($products as $product)
            <tr>
                <td><img src="{{ asset("storage/$product->image") }}" alt="image" width="30px" height="30px"></td>
                <td>{{ $product->title}}</td>
                <td><a href="{{  url("/showadmin/$product->id")  }}" class="btn btn-info" >show</a></td>
                <td><a href="{{  url("/edit/$product->id")  }}" class="btn btn-primary" >update</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
   <div class=" d-flex justify-content-center">{{ $products->links() }}</div>

</div>

@endsection

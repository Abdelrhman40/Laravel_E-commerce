@extends('layout')
<div class="container-fluid w-50 pt-4">
    <div class="row">
        <div class="col-md-10">
            <div class="d-flex justify-content-between border-bottom mb-5" >
                <div><h3>Edit Product</div>
                <div><a href="{{ url('/adminPage') }}" class="text-decoration-none">Back</a></div>
            </div>
            {{--  <div class="container w-50">

            </div>  --}}
            <form action="{{ url("/update/$product->id") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column mb-3">
                    <label class="my-3" >Title</label>
                    <input type="text" class="form-control" value="{{ $product->title }}" name="title" >
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label >Price</label>
                    <input type="text" class="form-control" value="{{ $product->price }}" name="price">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label >rate</label>
                    <input type="text" class="form-control" value="{{ $product->rate }}" name="rate" >
                    @error('rate')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label > desc</label>
                    <input type="text" class="form-control" value="{{ $product->desc }}" name="desc">
                    @error('desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label>image</label>
                    <input type="file" name="image" value="Choose File">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <img src="{{ asset("storage/$product->image") }}"  width="200px">
                </div>
                <div class="mb-4">
                    <label>Category name</label>

                    <select name="category_id" id="">
                        <option value="{{ $product->category->id }}">{{ $product->category->category_name }}</option>
                        @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach

                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" name="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</div>

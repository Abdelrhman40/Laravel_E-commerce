<div class="container d-flex">
    <div class="row">
        @foreach ($products as $product )
            <div class="col-md-3 mb-4 ">
                <div class="card h-100 text-center p-4" >
                        <img src="{{ asset("storage/$product->image") }}" class="card-img-top mb-0 " height="250px" alt={{$product->title}}/>
                        <div class="card-body">
                            <h5 class="card-title"> {{ $product->title }}</h5>
                            <p class="card-text lead fw-bold"> {{ $product->price }}</p>
                            <a href="{{  url("/show/$product->id")  }}"   class="btn btn-outline-dark">Buy Now</a>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

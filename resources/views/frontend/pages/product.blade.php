@extends('frontend.master')
@section('content')
<div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// Bakery Products</p>
                <h1 class="display-6 mb-4">Explore Of Our Bakery Products</h1>
            </div>
            
            <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">{{$product->price}} .BDT Per Unit</div>
                            <h3 class="mb-3"> {{$product->name}} </h3>
                            <span>Tempor erat elitr rebum at clita dolor diam ipsum sit diam amet diam et eos</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{url('Frontend/')}}/img/product-1.jpg" alt="">
                            <div class="product-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-eye text-primary"></i></a>
                            </div>
                        </div>

                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('order.now',$product->id)}}">Order Now</a></div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
           
        </div>
    </div>
@endsection
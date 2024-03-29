@extends('frontend.master')
@section('product')
<div class="container-xxl bg-light my-6 py-6 pt-0">
<div class="container">
    <div class="row g-4">
        
        @if($productsUnderCategory->count()>0)
        @foreach ($productsUnderCategory as $product)
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                <a href="{{route('single.product.view',$product->id)}}">
                    <div class="text-center p-4">
                        <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">{{$product->price}} .BDT Per Unit</div>
                        <h3 class="mb-3"> {{$product->name}} </h3>
                        <span>{{$product->description}}</span>
                    </div>
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{url('/uploads/'.$product->image)}}" alt="" style="width: 400px; height: 200px;">
                        <div class="product-overlay">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{route('single.product.view',$product->id)}}"><i class="fa fa-eye text-primary"></i></a>
                        </div>
                    </div>

                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        
                        <div class="text-center">
                            @if($product->status=='active')
                            <a class="btn btn-outline-dark mt-auto" href="{{route('add.to.cart',$product->id)}}">Add to cart</a>

                            <a type="button" class="btn btn-outline-dark mt-auto" href="{{route('add.to.wishlist',$product->id)}}"><i class="bi bi-heart"></i></a>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @else
        <h1>Not found any products!</h1>
        @endif
    </div>
</div>
</div>
@endsection
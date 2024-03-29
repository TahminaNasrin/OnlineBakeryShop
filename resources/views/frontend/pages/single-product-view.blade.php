@extends('frontend.master')

@section('content')

<div class="container-xxl bg-light my-6 py-6 pt-0">
    <div class="container">
        <div class="row dd-flex justify-content-center">
            <div class="col-md-8">
                <div class="card px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-row align-items-center"> <i class='fa fa-apple fs-1'></i>
                                <span class="fw-bold ms-1 fs-5">Category Name:{{$singleProduct->category_name}}</span>
                            </div>
                            <h1 class="fs-1 ms-1 mt-3">{{$singleProduct->name}}</h1>
                            <div class="ms-1"> <span>Status:{{$singleProduct->status}}</span> </div>
                            <div class="ms-1"> <span>Price:{{$singleProduct->price}} .BDT</span> </div>
                            <div class="mt-5 radio-buttons"> <label class="radio"> <input type="radio" name="code" value="grey" checked> <span></span> </label> <label class="radio"> <input type="radio" name="code" value="pink"> <span></span> </label> <label class="radio"> <input type="radio" name="code" value="black"> <span></span> </label> </div>
                            <div> <a class="button" href="{{route('add.to.cart',$singleProduct->id)}}"> <span>Add to Cart</span> <i class="ms-2 fa fa-long-arrow-right"></i> </a> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-image"> <img src="{{url('/uploads/'.$singleProduct->image)}}" style="width: 400px; height: 200px;"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('frontend.master')


@section('content')
<div class="container">
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="{{url('Frontend/')}}/img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="{{url('Frontend/')}}/img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">// About Us</p>
                        <h1 class="display-6 mb-4">We Bake Every Item From The Core Of Our Hearts</h1>
                        <p>This is an Online Bakery Shop.Where you can choose product or you can customize the product.We give our best efforts to serve you and give you a best taste.</p>
                        <p>We are providing some facilities.Those are--</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Quality Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Custom Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Online Order
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Home Delivery
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
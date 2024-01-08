@extends('frontend.master')

@section('review')

<!-- Testimonial Start -->
<div class="container-xxl bg-light my-6 py-6 pb-0">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">// Client's Review</p>
            <h1 class="display-6 mb-4">Lots Of Customers Trusted Us</h1>

            @auth
            <a class="btn btn-primary" href="{{route('user.review')}}">Give Review Here</a>
            @endauth

        </div>



        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach($reviews as $review)
            <div class="testimonial-item bg-white rounded p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="{{url('/uploads/'. $review->user->image)}}" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">{{$review->user->name}}</h5>
                        <span>{{$review->user->role}}</span>
                    </div>
                </div>
                <p class="mb-0">{{$review->review}}</p>
            </div>
            @endforeach
        </div>

    </div>
</div>
<!-- Testimonial End -->
@endsection
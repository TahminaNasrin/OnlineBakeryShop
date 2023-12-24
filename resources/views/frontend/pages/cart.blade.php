@extends('frontend.master')
@section('content')

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">
              <h5 class="mb-4" ><a href="{{route('whole.cart.remove')}}" type="button" class="text-body">Remove Cart</a></h5>
              
              <div class="col-lg-7">
                <h5 class="mb-3"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have
                      @if(session()->has('vcart'))
                      {{ count(session()->get('vcart')) }}
                      @else
                      0
                      @endif

                      items in your cart
                    </p>
                  </div>
                </div>

                @php

                $subtotal=array_sum(array_column(session()->get('vcart'),'subtotal'));

                @endphp

                @if(session()->has('vcart'))
                @foreach(session()->get('vcart') as $item )

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img src="{{url('/uploads/')}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{$item['name']}}</h5>

                        </div>
                      </div>

                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <a href="{{route('cart.quantity.decrease',$item['id'])}}" type="button" max="17" class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </a>

                        <input type="text" class="qty-input form-control" maxlength="2" min="0" max="15" value="{{$item['quantity']}}">
                        <!-- <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" /> -->

                        <a href="{{route('cart.quantity.increase',$item['id'])}}" type="button" class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </a>
                      </div>

                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">{{$item['quantity']}} x {{$item['price']}} .BDT</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">= {{$item['subtotal']}} .BDT</h5>
                        </div>
                        <a href="{{route('cart.delete',$item['id'])}}" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif

              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">

                  <hr class="my-4">

                  <div class="d-flex justify-content-between">
                    <p class="mb-2">Subtotal</p>
                    <p class="mb-2">{{ $subtotal }} BDT</p>
                  </div>

                  <div class="d-flex justify-content-between">
                    <p class="mb-2">Shipping</p>
                    <p class="mb-2">$80.00</p>
                  </div>

                  <div class="d-flex justify-content-between mb-4">
                    <p class="mb-2">Total(Incl. taxes)</p>
                    <p class="mb-2">{{ $subtotal+80 }} BDT</p>
                  </div>

                  <a type="button" href="{{route('checkout')}}" class="btn btn-info btn-block btn-lg">
                    <div class="d-flex justify-content-between">
                      <span>{{ $subtotal+80 }}.BDT</span>
                      <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                    </div>
                  </a>

                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
</section>

@endsection
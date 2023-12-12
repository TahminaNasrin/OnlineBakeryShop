@extends('frontend.master')
@section('content')

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="#!" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
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
            
                    items in your cart</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
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
                          <img
                            src="{{url('/uploads/')}}"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{$item['name']}}</h5>
                          
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">{{$item['quantity']}} x {{$item['price']}} .BDT</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">= {{$item['subtotal']}} .BDT</h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
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

                    <a type="button"href="{{route('checkout')}}" class="btn btn-info btn-block btn-lg">
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


<!-- <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                    <hr>
                    <h6 class="mb-0">Shopping cart</h6>
                    <div class="d-flex justify-content-between"><span>You have
                        
                        @if(session()->has('vcart'))
                        {{ count(session()->get('vcart')) }}
                        @else
                        0
                        @endif
                        
                        items in your cart</span>
                        <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                            <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i></div>
                        </div>
                    </div>


                    @php 

                      $subtotal=array_sum(array_column(session()->get('vcart'),'subtotal'));

                    @endphp


                    @if(session()->has('vcart'))
                    @foreach(session()->get('vcart') as $item )
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                        <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/QRwjbm5.jpg" width="40">
                            <div class="ml-2"><span class="font-weight-bold d-block">{{$item['name']}}</span><span class="spec"></span></div>
                        </div>
                        <div class="d-flex flex-row align-items-center"><span class="d-block">{{$item['quantity']}} x {{$item['price']}} .BDT</span>
                        <span class="d-block ml-5 font-weight-bold"> = {{$item['subtotal']}} .BDT</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                    </div>
                    @endforeach
                    @endif
            
                </div>
            </div>
            <div class="col-md-4">
                    
                    <div class="d-flex justify-content-between information"><span>Subtotal</span><span>{{ $subtotal }} BDT </span></div>
                    <div class="d-flex justify-content-between information"><span>Shipping</span><span>$80.00</span></div>
                    <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>{{ $subtotal+80 }} BDT</span></div>
                    <a href="{{route('checkout')}}" class="btn btn-primary btn-block d-flex justify-content-between mt-3"  type="button"><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></a></div></hr>
            </div>
        </div>
</div> -->

@endsection
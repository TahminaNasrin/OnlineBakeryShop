@extends('frontend.master')
@section('content')
<div class="container-xxl bg-light my-6 py-6 pt-0">
    <div class="container wrapper">
        <form action="{{route('order.place')}}" method="post" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong> Name:</strong>
                                    <input type="string" name="name" class="form-control" value="{{auth()->user()->name}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="email" name="email_address" class="form-control" value="{{auth()->user()->email}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Receiver Mobile:</strong></div>
                                <div class="col-md-12">
                                    <input type="integer" name="receiver_mobile" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Receiver Name:</strong></div>
                                <div class="col-md-12">
                                    <input type="string" name="receiver_name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Receiver Email:</strong></div>
                                <div class="col-md-12">
                                    <input type="email" name="receiver_email" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Order Note:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="order_note" class="form-control" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">

                        <div class="panel-body">


                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" href="{{route('order.place')}}" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </form>

    </div>
</div>
@endsection
@extends('frontend.master')
@section('content')


<div class="container-xxl transparent my-6 py-6 pt-0">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="{{url('/uploads/'. auth()->user()->image)}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <a href="{{route('profile.edit', auth()->user()->id)}}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Edit Profile</a>
                                    </div>
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{auth()->user()->name}}</a></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)">20</a> Completed Orders</h6>
                                    <h6 class="d-block"><a href="javascript:void(0)">6</a> Pending Oders</h6>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ auth()->user()->name }}
                                            </div>
                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ auth()->user()->email }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Role</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ auth()->user()->role }}
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- <a class="btn btn-warning" href="">Invoice List</a> -->

    <button class="btn btn-success" onclick="printContent('printDiv')">Print</button>

    <div id="printDiv">

        <h1>Order list</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Receiver Mobile</th>
                    <th scope="col">Receiver Name</th>
                    <th scope="col">Receiver Email</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Order Note</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($orderDetails as $key=>$orderDetail)

                <tr>
                    <th scope="row">{{$orderDetail->order->id}}</th>
                    <td>{{$orderDetail->created_at}}</td>
                    <td>{{ $orderDetail->user->name }}</td>
                    <td>{{$orderDetail->order->address}}</td>
                    <td>{{$orderDetail->order->receiver_mobile}}</td>
                    <td>{{$orderDetail->order->receiver_name}}</td>
                    <td>{{$orderDetail->order->receiver_email }}</td>
                    <td>{{$orderDetail->quantity }}</td>
                    <td>{{$orderDetail->subtotal }}</td>
                    <td>{{$orderDetail->order->order_note }}</td>
                    <td>{{$orderDetail->order->status}}</td>
                    <td>
                        @if($orderDetail->order->status == 'pending')
                        <!-- <a class="btn btn-warning" href="{{ route('profile.order.summary', $orderDetail->order->id) }}">Order Summary</a> -->
                        <a class="btn btn-danger" href="{{ route('order.cancel', $orderDetail->order->id) }}">Cancel Order</a>
                        @endif
                    </td>
                </tr>
                @endforeach




            </tbody>
        </table>
    </div>

    @endsection

    @push('yourJsCode')

    <script type="text/javascript">
        function printContent(el) {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
    @endpush
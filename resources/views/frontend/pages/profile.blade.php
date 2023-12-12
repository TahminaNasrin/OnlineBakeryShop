@extends('frontend.master')
@section('content')

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
                                     <a href="{{route('profile.edit', auth()->user()->id)}}" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" >Edit Profile</a>
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
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                   
                                </ul>
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

    <hr>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">User ID</th>
      <th scope="col">Address</th>
      <th scope="col">Receiver Mobile</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Receiver Email</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>   

 
    @foreach ($orders as $order)
   
        <tr>
          <th scope="row">{{$order->id}}</th>
          <td>{{$order->created_at}}</td>
          <td>{{$order->user_id}}</td>
          <td>{{$order->address}}</td>
          <td>{{$order->receiver_mobile}}</td>
          <td>{{$order->receiver_name}}</td>
          <td>{{$order->receiver_email }}</td>
          <td>{{$order->status}}</td>
          <td>
            @if($order->status=='pending')
            <a class="btn btn-warning" href="">Make Payment</a>
            <a class="btn btn-danger" href="{{route('order.cancel',$order->id)}}">Cancel Order</a>
            @endif  
        </td>
        </tr>
    @endforeach
       
        
   
    
  </tbody>
</table>
    

@endsection
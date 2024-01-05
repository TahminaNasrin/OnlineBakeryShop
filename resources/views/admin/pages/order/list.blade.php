@extends('admin.master')
@section('content')
<div class="container-fluid px-4">
<h1>Order List</h1>
<a href="{{route('order.form')}}">
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Date</th>
      <th scope="col">User Id</th>
      <th scope="col">Address</th>
      <th scope="col">Reciever Mobile</th>
      <th scope="col">Reciever Name</th>
      <th scope="col">Reciever Email</th>
      <th scope="col">DeliveryMan Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($orders as $key=>$order)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$order->created_at}}</td>
      <td>{{$order->user_id}}</td>
      <td>{{$order->address}}</td>
      <td>{{$order->receiver_mobile}}</td>
      <td>{{$order->receiver_name}}</td>
      <td>{{$order->receiver_email}}</td>
      <td>{{$order->delivery_men_name}}</td>
      <td>{{$order->status}}</td>
      <td>
        
        <a href="{{route('order.reject',$order->id)}}" class="btn btn-danger">Reject</a>
        <a href="{{route('deliveryMan.edit',$order->id)}}" class="btn btn-warning">Delivery Man Assign</a>
        <a href="{{route('order.done',$order->id)}}" class="btn btn-success">Order Done</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$orders->links()}}
@endsection

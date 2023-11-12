@extends('admin.master')
@section('content')
<h1>OrderDetails Info</h1>
<a href="{{route('order.details.form')}}">
    <button class='btn btn-success'>Add</button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price per Unit</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Cost</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($orderDetails as $key=>$orderDetail)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$orderDetail->order_id}}</td>
      <td>{{$orderDetail->customer_name}}</td>
      <td>{{$orderDetail->product_name}}</td>
      <td>{{$orderDetail->product_price}}</td>
      <td>{{$orderDetail->quantity}}</td>
      <td>{{$orderDetail->total_cost}}</td>
      <td>
        <a href="" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

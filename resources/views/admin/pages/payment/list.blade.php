@extends('admin.master')
@section('content')
<h1>Payment List</h1>
<a href="{{route('payment.form')}}">
    <button class='btn btn-success'>Add New Payment</button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Order ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Total Price</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($payments as $key=>$payment)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$payment->date}}</td>
      <td>{{$payment->order_id}}</td>
      <td>{{$payment->customer_name}}</td>
      <td>{{$payment->total_price}}</td>
      <td>{{$payment->payment_method}}</td>
      <td>
        <a href="" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$payments->links()}}
@endsection
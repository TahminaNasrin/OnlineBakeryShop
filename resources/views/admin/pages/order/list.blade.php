@extends('admin.master')
@section('content')
<h1>Order List</h1>
<a href="{{route('order.form')}}">
    <button class='btn btn-success'>Add Order</button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($orders as $key=>$order)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$order->date}}</td>
      <td>{{$order->customer_name}}</td>
      <td>{{$order->price}}</td>
      <td>{{$order->quantity}}</td>
      <td>
        <a href="" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$orders->links()}}
@endsection

@extends('admin.master')
@section('content')
<h1>Cart List</h1>
<a href="{{route('cart.form')}}">
    <button class='btn btn-success'>Add new Cart</h1></button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Total Cost</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($carts as $key=>$cart)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$cart->product_name}}</td>
      <td>{{$cart->product_price}}</td>
      <td>{{$cart->total_cost}}</td>
      <td>
        <a href="" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

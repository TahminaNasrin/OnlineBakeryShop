@extends('admin.master')
@section('content')
<div class="container-fluid px-4">
<h1>Customer List</h1>
<!-- <a href="{{route('customer.form')}}">
    <button class='btn btn-success'>Add Customers</button>
</a> -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Phone No</th>
      <th scope="col">Address</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($customers as $key=>$customer)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$customer->name}}</td>
      <td>{{$customer->email}}</td>
      <!-- <td>{{$customer->phoneNo}}</td>
      <td>{{$customer->address}}</td> -->
      <td>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection
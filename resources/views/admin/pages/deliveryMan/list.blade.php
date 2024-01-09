@extends('admin.master')
@section('content')
<div class="container-fluid px-4">
<h1>DeliveryMan List</h1>
<a href="{{route('deliveryMan.form')}}">
    <button class='btn btn-success'>Add Delivery Man</button>
</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Area</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($deliveryMans as $key=>$delivery)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$delivery->name}}</td>
      <td>{{$delivery->email}}</td>
      <td>{{$delivery->mobile_no}}</td>
      <td>{{$delivery->area}}</td>
      <td>{{$delivery->image}}</td>
      <td>
        
        <a href="{{route('deliveryMan.delete',$delivery->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{route('deliveryMan.edit',$delivery->id)}}" class="btn btn-success">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection

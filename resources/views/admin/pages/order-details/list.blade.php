@extends('admin.master')
@section('content')
<h1>OrderDetails Info</h1>
<a href="/order-details/form">
    <button class='btn btn-success'>Add</button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>

@endsection

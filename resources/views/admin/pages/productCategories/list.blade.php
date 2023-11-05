@extends('admin.master')
@section('content')
<h1>Product list</h1>
<a href="/product/form">
    <button class='btn btn-success'>Add Product</button>
</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($categories as $key=>$category)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->quantity}}</td>
      <td>{{$category->status}}</td>
      <td>
        <a class="btn btn-success">Edit</a>
        <a class="btn btn-danger">Delete</a>
     </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
{{$categories->links()}}
@endsection
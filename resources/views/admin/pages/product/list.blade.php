@extends('admin.master')
@section('content')
<div class="container-fluid px-4">
<h1>Product List</h1>
<a href="{{route('product.form')}}">
    <button class='btn btn-success'>Add Product</button>
</a>
<table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Price Per Unit</th>
      <th scope="col">Stock</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($products as $key=>$product)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->category_name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->stock}}</td>
      <td>{{$product->description}}</td>
      <td>
         <img  width="12%" src="{{url('/uploads/'.$product->image)}}" alt="">
      </td>
      <td>{{$product->status}}</td>
      <td>
        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
        <a class="btn btn-primary">View</a>
     </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>
@endsection
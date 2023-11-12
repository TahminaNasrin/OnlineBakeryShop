@extends('admin.master')
@section('content')
<form action="{{route('cart.store')}}" method="post" autocomplete="off">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Name</label>
    <input type="string" class="form-control" name="product_name" id="exampleFormControlSelect1" placeholder="Enter Product Name " required >

    @error('product_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Price per Unit</label>
    <input type="string" class="form-control" name="product_price" id="exampleFormControlSelect1" placeholder="Enter Product Price" required>

    @error('product_price')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  

  <div class="form-group">
    <label for="exampleFormControlSelect1">Total Cost</label>
    <input type="text" class="form-control" name="total_cost" id="exampleFormControlSelect1" placeholder="Enter total cost" required>
    </input>
    @error('total_cost')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>


  <button class="btn btn-primary">Confirm Order</button>

</form>

@endsection
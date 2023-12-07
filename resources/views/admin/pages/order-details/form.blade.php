<!-- @extends('admin.master')
@section('content')
<form action="{{route('order.details.store')}}" method="post" autocomplete="off">
    @csrf

    <div class="form-group">
    <label for="exampleFormControlSelect1">Order ID</label>
    <input type="numeric" class="form-control" name="order_id" id="exampleFormControlSelect1" placeholder="Enter Product Name " required >

    @error('order_id')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  <div class="form-group">
    <label for="exampleFormControlSelect1">Customer Name</label>
    <input type="string" class="form-control" name="customer_name" id="exampleFormControlSelect1" placeholder="Enter Product Name " required >

    @error('customer_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror


    <div class="form-group">
    <label for="exampleFormControlSelect1">Product Name</label>
    <input type="string" class="form-control" name="product_name" id="exampleFormControlSelect1" placeholder="Enter Product Name " required >

    @error('product_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Price per Unit</label>
    <input type="double" class="form-control" name="product_price" id="exampleFormControlSelect1" placeholder="Enter Product Price" required>

    @error('product_price')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Quantity</label>
    <input type="numeric" class="form-control" name="quantity" id="exampleFormControlSelect1" placeholder="Enter Product quantity" required>

    @error('quantity')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Total Cost</label>
    <input type="double" class="form-control" name="total_cost" id="exampleFormControlSelect1" placeholder="Enter total cost" required>
    </input>
    @error('total_cost')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>


  <button class="btn btn-primary">Submit</button>

</form>

@endsection -->
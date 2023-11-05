@extends('admin.master')
@section('content')
<form action="{{route('order.store')}}" method="post" autocomplete="off">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Date</label>
    <input type="date" class="form-control" name=" Order_Date" id="exampleFormControlSelect1" placeholder="Enter Date" required >

    @error('date')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Customer Name</label>
    <input type="string" class="form-control" name="Customer_Name" id="exampleFormControlSelect1" placeholder="Enter Customer Name" required>

    @error('customer_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  

  <div class="form-group">
    <label for="exampleFormControlSelect1">Price</label>
    <input type="text" class="form-control" name="Order_Price" id="exampleFormControlSelect1" placeholder="Enter Product Price" required>
    </input>
    @error('price')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

 

  <div class="form-group">
    <label for="exampleFormControlSelect1">Quantity</label>
    <input type="text" class="form-control" name="Order_Quantity" id="exampleFormControlSelect1" placeholder="Enter Product Quantity" required>
    </input>

    @error('quantity')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <button class="btn btn-primary">Submit</button>

</form>

@endsection
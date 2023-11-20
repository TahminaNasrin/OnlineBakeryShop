@extends('admin.master')
@section('content')
<form action="{{route('payment.store')}}" method="post" autocomplete="off">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Date</label>
    <input type="date" class="form-control" name="date" id="exampleFormControlSelect1" placeholder="Enter Date" required >

    @error('date')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Order ID</label>
    <input type="numeric" class="form-control" name="order_id" id="exampleFormControlSelect1" placeholder="Enter Order ID " required >

    @error('order_id')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Customer Name</label>
    <input type="string" class="form-control" name="customer_name" id="exampleFormControlSelect1" placeholder="Enter Customer Name" required>

    @error('customer_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  

  <div class="form-group">
    <label for="exampleFormControlSelect1">Total Price</label>
    <input type="double" class="form-control" name="total_price" id="exampleFormControlSelect1" placeholder="Enter Total Price" required>
    </input>

    @error('total_price')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

 
  <div class="form-group">
    <label for="exampleFormControlSelect1">Payment Method</label>
    <input type="string" class="form-control" name="payment_method" id="exampleFormControlSelect1" placeholder="Enter Payment Method" required>
    </input>

    @error('payment_method')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <button class="btn btn-primary">Submit</button>

</form>

@endsection
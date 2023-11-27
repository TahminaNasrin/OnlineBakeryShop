<!-- @extends('admin.master')
@section('content')
<form action="{{route('order.store')}}" method="post" autocomplete="off">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Date</label>
    <input type="date" class="form-control" name=" date" id="exampleFormControlSelect1" placeholder="Enter Date" required >

    @error('date')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product ID</label>
    <input type="numeric" class="form-control" name="product_id" id="exampleFormControlSelect1" placeholder="Enter Product ID:" required>

    @error('product_id')
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
    <label for="exampleFormControlSelect1">Price</label>
    <input type="text" class="form-control" name="price" id="exampleFormControlSelect1" placeholder="Enter Product Price" required>
    </input>
    @error('price')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

 

  <div class="form-group">
    <label for="exampleFormControlSelect1">Quantity</label>
    <input type="text" class="form-control" name="quantity" id="exampleFormControlSelect1" placeholder="Enter Product Quantity" required>
    </input>

    @error('quantity')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  <button class="btn btn-primary">Submit</button>

</form>

@endsection -->
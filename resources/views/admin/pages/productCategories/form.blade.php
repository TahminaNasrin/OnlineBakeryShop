@extends('admin.master')
@section('content')
<form action="{{route('categories.store')}}" method="post" autocomplete="off">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Name</label>
    <input type="text" class="form-control" name=" Category_Name" id="exampleFormControlSelect1" placeholder="Enter Product Name">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Quantity</label>
    <input type="numeric" class="form-control" name="Category_Quantity" id="exampleFormControlSelect1" placeholder="Enter Product Quantity">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <input type="text" class="form-control" name="Category_Status" id="exampleFormControlSelect1" placeholder="Available or Not?">
    </input>
  </div>

  <button class="btn btn-primary">Submit</button>

</form>

@endsection
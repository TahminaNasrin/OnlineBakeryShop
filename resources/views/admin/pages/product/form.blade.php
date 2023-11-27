@extends('admin.master')
@section('content')
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlSelect1" placeholder="Enter Product Name" required>
    </input>
    @error('name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Category ID</label>
    <input type="numeric" class="form-control" name="category_id" id="exampleFormControlSelect1" placeholder="Enter Product Type"required>
    </input>
    @error('category_id')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Price Per Unit</label>
    <input type="numeric" class="form-control" name="price" id="exampleFormControlSelect1" placeholder="Enter Price: "required>
    </input>
    @error('price')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Stock</label>
    <input type="numeric" class="form-control" name="stock" id="exampleFormControlSelect1" placeholder="Enter Stock No: "required>
    </input>
    @error('stock')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Description</label>
    <input type="text" class="form-control" name="description" id="exampleFormControlSelect1" placeholder="Enter Description: ">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Image</label>
    <input type="file" class="form-control" name="image" id="exampleFormControlSelect1" placeholder="Choose Product Image: ">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <input type="string" class="form-control" name="status" id="exampleFormControlSelect1" placeholder="Enter Product Status: ">
    </input>
  </div>

  <button class="btn btn-primary">Submit</button>

</form>

@endsection
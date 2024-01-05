<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  @extends('admin.master')
  @section('content')

  <div class="container bg-light col-md-5 pd-4 py-3 card shadow">
    <h1>Edit Product Categories</h1>

    <form action="{{route('categories.update',$category->id)}}" method="post" autocomplete="off">
      @csrf
      @method('put')

      <div class="form-group">
        <label for="exampleFormControlSelect1">Name</label>
        <input value="{{$category->name}}" type="text" class="form-control" name=" Category_Name" id="exampleFormControlSelect1" placeholder="Enter Product Name">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Quantity</label>
        <input value="{{$category->quantity}}" type="numeric" class="form-control" name="Category_Quantity" id="exampleFormControlSelect1" placeholder="Enter Product Quantity">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Status</label>
        <input value="{{$category->status}}" type="text" class="form-control" name="Category_Status" id="exampleFormControlSelect1" placeholder="Available or Not?">
        </input>
      </div>

      <button class="btn btn-primary">Submit</button>

    </form>
  </div>
  @endsection
</body>

</html>
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
    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="exampleFormControlSelect1">Name</label>
        <input type="text" value="{{$product->name}}" class="form-control" name="name" id="exampleFormControlSelect1" placeholder="Enter Product Name" required>
        </input>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Select Category:</label>
        <select required class="form-control" name="category_name" id="">

          @foreach ($categories as $category )
          <option @if($product->category_name==$category->name) selected @endif value="{{$category->name}}">{{$category->name}}</option>
          @endforeach

        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Price Per Unit</label>
        <input value="{{$product->price}}" type="numeric" class="form-control" name="price" id="exampleFormControlSelect1" placeholder="Enter Price: " required>
        </input>
        @error('price')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Stock</label>
        <input value="{{$product->stock}}" type="numeric" class="form-control" name="stock" id="exampleFormControlSelect1" placeholder="Enter Stock No: " required>
        </input>
        @error('stock')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Description</label>
        <input value="{{$product->description}}" type="text" class="form-control" name="description" id="exampleFormControlSelect1" placeholder="Enter Description: ">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Image</label>
        <input value="{{$product->image}}" type="file" class="form-control" name="image" id="exampleFormControlSelect1" placeholder="Choose Product Image: ">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Status</label>
        <input value="{{$product->status}}" type="string" class="form-control" name="status" id="exampleFormControlSelect1" placeholder="Enter Product Status: ">
        </input>
      </div>

      <button class="btn btn-primary">Submit</button>

    </form>
  </div>
  @endsection
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<div class="container-xxl transparent my-6 py-6 pt-0">
@extends('frontend.master')
@section('content')
<div class="container transparent col-md-5 pd-4 py-3 card shadow">
<h1>Edit Your Profile</h1>

<form action="{{route('profile.update',$users->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('put')
   

  <div class="form-group">
    <label for="exampleFormControlSelect1">Full Name</label>
    <input value="{{ auth()->user()->name }}" type="text" class="form-control" name=" name" id="exampleFormControlSelect1" placeholder="Enter Product Name">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Email</label>
    <input value="{{ auth()->user()->email }}" type="numeric" class="form-control" name="email" id="exampleFormControlSelect1" placeholder="Enter Product Quantity">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <input value="{{ auth()->user()->role }}" type="text" class="form-control" name="role" id="exampleFormControlSelect1" placeholder="Available or Not?">
    </input>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Image</label>
    <input value="{{ auth()->user()->image }}" type="file" class="form-control" name="image" id="exampleFormControlSelect1" placeholder="Choose Your Image:">
    </input>
  </div>

  <button class="btn btn-primary">Submit</button>

</form>
</div>
</div>
@endsection
</body>
</html>

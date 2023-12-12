@extends('frontend.master')
@section('content')
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

@endsection
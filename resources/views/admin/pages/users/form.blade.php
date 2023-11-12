@extends('admin.master')
@section('content')

<h1>Create New User</h1>

<form action="{{route('users.store')}}" method="post"  enctype="multipart/form-data"  autocomplete="off">
    @csrf

    <div class="form-group">
    <label for="exampleFormControlSelect1">User Name</label>
    <input type="string" class="form-control" name="user_name" id="exampleFormControlSelect1" placeholder="Enter User Name " required >

    @error('user_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <input type="string" class="form-control" name="role" id="exampleFormControlSelect1" placeholder=" " required >

    @error('role')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror


    <div class="form-group">
    <label for="exampleFormControlSelect1">Email</label>
    <input type="string" class="form-control" name="user_email" id="exampleFormControlSelect1" placeholder="Enter User Email" required >

    @error('user_email')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Password</label>
    <input type="string" class="form-control" name="user_password" id="exampleFormControlSelect1" placeholder="Enter User Password" required>

    @error('user_password')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror

  </div>

  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Image</label>
    <input type="file" class="form-control" name="user_image" id="exampleFormControlSelect1" placeholder="Choose User Image" >

  </div>


  <button class="btn btn-primary">Submit</button>

</form>

@endsection
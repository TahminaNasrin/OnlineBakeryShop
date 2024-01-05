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
    <form action="{{route('customer.store')}}" method="post" autocomplete="off">
      @csrf

      <div class="form-group">
        <label for="exampleFormControlSelect1">Name</label>
        <input type="text" class="form-control" name="customer_name" id="exampleFormControlSelect1" placeholder="Enter customer Name">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Email</label>
        <input type="numeric" class="form-control" name="customer_email" id="exampleFormControlSelect1" placeholder="Enter Customer Email">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Phone No</label>
        <input type="text" class="form-control" name="customer_phoneNo" id="exampleFormControlSelect1" placeholder="Enter your Phone No">
        </input>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Address</label>
        <input type="text" class="form-control" name="customer_address" id="exampleFormControlSelect1" placeholder="Enter Your Address">
        </input>
      </div>

      <button class="btn btn-primary">Submit</button>

    </form>
  </div>
  @endsection
</body>

</html>

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
  <div class="container bg-light col-md-5 pd-4 py-3 card shadow">
    <form action="{{route('review.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Give Comments</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
      </div>
      <button class="btn btn-success">Submit</button>
    </form>
  </div>
  @endsection
  </div>
</body>

</html>
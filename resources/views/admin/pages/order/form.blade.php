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


    <form action="{{route('DeliveryMan.info.store')}}" method="post" autocomplete="off">
      @csrf

      <div class="form-group">
        <label for="">Select DeliveryMan:</label>
        <select required class="form-control" name="delivery_men_name" id="">

          @foreach ($deliveryMans as $delivery )
          <option type="string" value="{{$delivery->id}}">{{$delivery->name}}</option>
          @endforeach

        </select>
      </div>

      <button class="btn btn-primary">Submit</button>

    </form>
  </div>
  @endsection
</body>

</html>
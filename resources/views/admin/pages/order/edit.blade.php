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
    <form action="{{route('deliveryMan.update',$orders->id)}}" method="post" autocomplete="off">
      @csrf
      @method('put')


      <div class="form-group">
        <label for="">Select DeliveryMan:</label>
        <select required class="form-control" name="delivery_men_name" id="">

          @foreach ($deliveryMen as $delivery )
          <option type="string" @if($orders->delivery_men_name==$delivery->name) selected @endif value="{{$delivery->name}} ({{$delivery->mobile_no}})">{{$delivery->name}} ({{$delivery->mobile_no}})</option>
          @endforeach

        </select>
      </div>

      <button class="btn btn-primary">Submit</button>

    </form>
  </div>
  @endsection
</body>

</html>
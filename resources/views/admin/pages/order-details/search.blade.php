@extends('admin.master')
@section('content')

<button class="btn btn-success" onclick="printContent('printDiv')">Print</button>

<a href="{{route('order.details.form')}}"></a>
<div id="printDiv">

  <h1>Sales Report</h1>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Order ID</th>
        <th scope="col">User ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total Cost</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($orderDetails as $key=>$orderDetail)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$orderDetail->created_at}}</td>
        <td>{{$orderDetail->order_id}}</td>
        <td>{{$orderDetail->user_id}}</td>
        <td>{{$orderDetail->user_name}}</td>
        <td>{{$orderDetail->product_name}}</td>
        <td>{{$orderDetail->quantity}}</td>
        <td>{{$orderDetail->subtotal}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

@push('yourJsCode')

<script type="text/javascript">
  function printContent(el) {
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
  }
</script>
@endpush
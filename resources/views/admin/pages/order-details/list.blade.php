@extends('admin.master')
@section('content')

<div class="container-fluid px-4">

<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('sales.report.search') }}" method="get" autocomplete="off">
    <div class="input-group">
       <b> Start Date: </b><input class="form-control" type="date" placeholder="Start Date" name="start_date" aria-label="Start Date" />
        <b> End Date: </b><input class="form-control" type="date" placeholder="End Date" name="end_date" aria-label="End Date" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>



<!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{route('sales.report.search')}}" method="get" autocomplete="off">
  <div class="input-group">
    <input class="form-control" type="date" placeholder="Search for..." name="search" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
  </div>
</form> -->
<!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('sales.report.search') }}" method="get" autocomplete="off">
    <div class="input-group">
        <input class="form-control" type="date" placeholder="Start Date" name="start_date" aria-label="Start Date" required /> To
        <input class="form-control" type="date" placeholder="End Date" name="end_date" aria-label="End Date" required />
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form> -->



<button class="btn btn-success" onclick="printContent('printDiv')">Print</button>

<a href="{{route('order.details.form')}}"></a>
<div id="printDiv">

  <h1>OrderDetails Info</h1>
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
</div>
{{$orderDetails->links()}}
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
@extends('frontend.master')
@section('content')
<button class="btn btn-success" onclick="printContent('printDiv')">Print</button>

<div id="printDiv">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <style>
            /* Global styles for your frontend go here */

            /* Custom styles for the invoice */
            .custom-invoice {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .custom-invoice img {
                width: 71px;
                border-radius: 43px;
            }

            .custom-invoice h5,
            .custom-invoice p {
                margin: 0;
                font-size: 16px;
                /* Adjust the font size for the invoice content */
            }

            .invoice-details {
                margin-top: 20px;
            }

            .custom-invoice table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }

            .custom-invoice th,
            .custom-invoice td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                font-size: 16px;
                /* Adjust the font size for the table cells */
            }

            .custom-invoice tfoot {
                font-weight: bold;
            }

            .footer {
                margin-top: 20px;
                text-align: center;
            }
        </style>

    </head>

    <body>


        <div class="container-xxl my-6 py-6 pt-0">
            <div class="custom-invoice">
                <div class="row">
                    <div class="col-md-6">
                        <div class="receipt-left">
                            <img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="receipt-right">
                            <h5>Online Bakery Shop</h5>
                            <p>01834540384 <i class="fa fa-phone"></i></p>
                            <p>bakeryshop@gmail.com <i class="fa fa-envelope-o"></i></p>
                            <p>Bangladesh <i class="fa fa-location-arrow"></i></p>
                        </div>
                    </div>
                </div>

                <div class="row invoice-details">
                    <div class="col-md-6">
                        <div class="receipt-right">
                            <h4><strong>Billed To</strong></h4>
                            <p><b>Name :</b>{{ $order->user->name }}</p>
                            <p><b>Email :</b>{{ $order->user->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="receipt-right">
                            <h4><strong>Shipping To</strong></h4>
                            <p><b>Name :</b>{{ $order->receiver_name }}</p>
                            <p><b>Email :</b>{{ $order->receiver_email }}</p>
                            <p><b>Mobile No :</b>{{ $order->receiver_mobile }}</p>
                            <p><b>Address :</b>{{ $order->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="receipt-left">
                            <h3>INVOICE: {{ $order->id }}</h3>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $orderDetail)
                            <tr>
                                <td>{{ $orderDetail->product->name }}</td>
                                <td>{{ $orderDetail->quantity }}</td>
                                <td>{{ $orderDetail->product->price }} BDT</td>
                                <td>{{ $orderDetail->quantity * $orderDetail->product->price }} BDT</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total Price:</strong></td>
                                <td>{{ $order->total_price }} BDT</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Shipping Charge:</strong></td>
                                <td>80 BDT</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Grand Total:</strong></td>
                                <td>{{ $order->total_price + 80 }} BDT</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row footer">
                    <div class="col-md-8">
                        <div class="receipt-right">
                            <p><b>Date :</b> {{ $order->created_at }}</p>
                            <h4 style="color: black;"><b>Thanks for shopping.!</b></h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="receipt-left">
                            <h1>Stamp</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </body>

    </html>
</div>
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

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;

class OrderController extends Controller
{
    
    
    
    
    // public function orderPlace(Request $request)
    // {
    //     //dd($request->all());
    //     //$productId = $request->input('product_id');
    //     $cart=session()->get('vcart');
        
    //     $order=Order::create([
    //         'user_id'=>auth()->user()->id,
    //         'status'=>'pending',
    //         'total_price'=>array_sum(array_column($cart,'subtotal')),
    //         'address'=>$request->address,
    //         'receiver_mobile'=>$request->receiver_mobile,
    //         'receiver_name'=>$request->receiver_name,
    //         'receiver_email'=>$request->receiver_email,
    //         'order_note'=>$request->order_note,
    //         'transaction_id'=>date('YmdHis'),
    //         'delivery_men_name'=>$request->delivery_men_name,
            
    //     ]);
        
    //     foreach($cart as $key=> $item)
    //     {
    //         OrderDetails::create([
    //             'order_id'=>$order->id,
    //             // 'product_id'=>$key,
    //             'product_name'=>$item['name'],
    //             'user_id'=>auth()->user()->id,
    //             'user_name'=>auth()->user()->name,
    //             'quantity'=>$item['quantity'],
    //             'subtotal'=>$item['subtotal'],
    //         ]);
            
    //     }
        
    //     session()->forget('vcart');
    //     $this->payment($order);

    //     notify()->success("Order Place Successfull.");
    //     return redirect()->back();

    // }


    public function orderPlace(Request $request)
    {
        $cart = session()->get('vcart');
        
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'pending',
            'total_price' => array_sum(array_column($cart, 'subtotal')),
            'address' => $request->address,
            'receiver_mobile' => $request->receiver_mobile,
            'receiver_name' => $request->receiver_name,
            'receiver_email' => $request->receiver_email,
            'order_note' => $request->order_note,
            'transaction_id' => date('YmdHis'),
            'delivery_men_name' => $request->delivery_men_name,
        ]);
    
        foreach ($cart as $key => $item) {
            
            $product = Product::where('name', $item['name'])->first();
    
            if ($product) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $item['name'],
                    'user_id' => auth()->user()->id,
                    'user_name' => auth()->user()->name,
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                ]);
            }
        }
    
        session()->forget('vcart');
        $this->payment($order);
    
        notify()->success("Order Place Successfully.");
        return redirect()->back();
    }
    


    public function payment($newOrder)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        //dd($newOrder);
        $post_data = array();
        $post_data['total_amount'] = $newOrder->total_price+80; # You cant not pay less than 10
        $post_data['currency'] = ".BDT";
        $post_data['tran_id'] = $newOrder->transaction_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $newOrder->receiver_name;
        $post_data['cus_email'] = $newOrder->receiver_email;
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $newOrder->receiver_mobile;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";
       
        //dd($post_data);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function cancelOrder($order_id)
    {

        $order=Order::find($order_id);
        if($order)
        {
            $order->update([
                'status'=>'cancelled'
            ]);
        }

        notify()->success('Order Cancelled');
       return redirect()->back();
    }

}

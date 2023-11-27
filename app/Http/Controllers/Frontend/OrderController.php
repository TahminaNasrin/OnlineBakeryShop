<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orderNow($productId)
    {
        //dd($request->all());

        Order::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$productId,
       ]);

       notify()->success('Order placed');
       return redirect()->back();

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

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function buyNow()
    {
        notify()->success('Order Successfull.');
        return redirect()->back(); 
    }
    
    
    
    public function orderPlace(Request $request)
    {
        //dd($request->all());

        $cart=session()->get('vcart');
        
        $order=Order::create([
            'user_id'=>auth()->user()->id,
            'status'=>'pending',
            'total_price'=>array_sum(array_column($cart,'subtotal')),
            'address'=>$request->address,
            'receiver_mobile'=>$request->receiver_mobile,
            'receiver_name'=>$request->receiver_name,
            'receiver_email'=>$request->receiver_email,
        ]);
        
        foreach($cart as $key=> $item)
        {
            OrderDetails::create([
                'order_id'=>$order->id,
                // 'product_id'=>$key,
                'product_id'=>$item['id'],
                'quantity'=>$item['quantity'],
                'subtotal'=>$item['subtotal'],
            ]);

        }
        
        session()->forget('vcart');
        notify()->success('Order placed Successfull.');
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

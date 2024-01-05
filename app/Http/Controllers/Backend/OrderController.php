<?php

namespace App\Http\Controllers\Backend;
use App\Models\Order;

use App\Models\Product;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
     public function list()
     {
        
        $orders=Order::paginate(5);
        return view('admin.pages.order.list',compact('orders'));
     }

     public function done($orderId)
     {
        $order=Order::find($orderId);
        if($order)
        {
            $order->update([
                'status'=>'Order Completed'
            ]);
        }
        notify()->success('Order Completed.');
        return redirect()->back();
     }

     public function reject($orderId)
     {
        $order=Order::find($orderId);
        if($order)
        {
            $order->update([
                'status'=>'Rejected'
            ]);
        }
        notify()->success('Order Rejected.');
        return redirect()->back();
     }

    

    
    public function deliveryManInfoStore(Request $request)
    {
        //dd($request->all());
       $valided=Validator::make($request->all(),[
        'delivery_men_name'=>'required',
       ]);

       if($valided->fails()){
        return redirect()->back()->witherrors($valided);
       }

        
        notify()->success('Delivery info stored.');

        return redirect()->back()->witherrors($valided);
    }

    
    public function edit($id)
    {
      $orders=Order::find($id);
      $deliveryMen=DeliveryMan::all();

      return view('admin.pages.order.edit',compact('deliveryMen','orders'));
     
    }

    public function update(Request $request,$id)
    {
        $orders=Order::find($id);

        if($orders)
        {

          $orders->update([
                'delivery_men_name'=>$request->delivery_men_name,
                'status'=>'Delivery Man Assigned',
          ]);

          notify()->success('deliveryMan name updated successfully.');
          return redirect()->route('order.list');
        }
    }
}

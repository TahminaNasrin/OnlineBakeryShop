<?php

namespace App\Http\Controllers;


use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderDetailsController extends Controller
{
    public function list()
    {
        $orderDetails=OrderDetail::paginate(5);
        return view('admin.pages.order-details.list',compact('orderDetails'));
    }
    
    public function form()
    {
        return view('admin.pages.order-details.form');
    }
    public function store(Request $request)
    {
        //dd($request->all());
       $valided=Validator::make($request->all(),[
        'order_id'=>'required',
        'customer_name'=>'required',
        'product_name'=>'required',
        'product_price'=>'required',
        'quantity'=>'required',
        'total_cost'=>'required',
       ]);

       if($valided->fails()){
        return redirect()->back()->witherrors($valided);
       }

        OrderDetail::create([
            'order_id'=>$request->order_id,
            'customer_name'=>$request->customer_name,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'quantity'=>$request->quantity,
            'total_cost'=>$request->total_cost
        ]);
        
        
        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function list()
    {
        $orders=Order::paginate(5);
        return view('admin.pages.order.list',compact('orders'));
    }
    public function form()
    {
        return view('admin.pages.order.form');
    }
    public function store(Request $request)
    {
        //dd($request->all());
       $valided=Validator::make($request->all(),[
        'date'=>'required',
        'customer_name'=>'required',
        'price'=>'required',
        'quantity'=>'required'
       ]);

       if($valided->fails()){
        return redirect()->back()->witherrors($valided);
       }

        Order::create([
            'date'=>$request->Order_Date,
            'customer_name'=>$request->Customer_Name,
            'price'=>$request->Order_Price,
            'quantity'=>$request->Order_Quantity
        ]);
        
        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

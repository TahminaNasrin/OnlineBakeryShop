<?php

namespace App\Http\Controllers\Backend;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // public function list()
    // {
    //     $orders=Order::paginate(5);
    //     return view('admin.pages.order.list',compact('orders'));
    // }
    // public function form()
    // {
    //     return view('admin.pages.order.form');
    // }
    // public function store(Request $request)
    // {
    //     //dd($request->all());
    //    $valided=Validator::make($request->all(),[
    //     'date'=>'required',
    //     'product_id'=>'required',
    //     'customer_name'=>'required',
    //     'price'=>'required',
    //     'quantity'=>'required'
    //    ]);

    //    if($valided->fails()){
    //     return redirect()->back()->witherrors($valided);
    //    }

    //     Order::create([
    //         'date'=>$request->date,
    //         'product_id'=>$request->product_id,
    //         'customer_name'=>$request->customer_name,
    //         'price'=>$request->price,
    //         'quantity'=>$request->quantity
    //     ]);
        
    //     notify()->success('Laravel Notify is awesome!');

    //     return redirect()->back()->witherrors($valided);
    // }
}

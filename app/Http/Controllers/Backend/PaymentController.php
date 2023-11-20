<?php

namespace App\Http\Controllers\Backend;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function list()
    {
        $payments=Payment::all();

        return view('admin.pages.payment.list',compact('payments'));
    }

    public function form()
    {
        return view('admin.pages.payment.form');
    }
    public function store(Request $request)
    {
        dd($request->all());
       $valided=Validator::make($request->all(),[
        'date'=>'required',
        'order_id'=>'required',
        'customer_name'=>'required',
        'total_price'=>'required',
        'payment_method'=>'required'
       ]);

       if($valided->fails()){
        return redirect()->back()->witherrors($valided);
       }

        Payment::create([
            'date'=>$request->date,
            'order_id'=>$request->order_id,
            'customer_name'=>$request->customer_name,
            'total_price'=>$request->total_price,
            'payment_method'=>$request->payment_method
        ]);
        
        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

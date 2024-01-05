<?php

namespace App\Http\Controllers\Backend;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Validator;

class OrderDetailsController extends Controller
{
    public function search(Request $request)
    {
        $orderDetails=OrderDetails::paginate(5); 
       if($request->search)
       {
        //dd('Here Your Products:');
        $orderDetails=OrderDetails::where('created_at','LIKE','%'.$request->search.'%')->get();
       }else
       {
        $orderDetails=OrderDetails::all();
       }
        
        return view('admin.pages.order-details.search',compact('orderDetails'));
    }
    
    
    public function list()
    {
        $orderDetails=OrderDetails::paginate(5);
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

        OrderDetails::create([
            'order_id'=>$request->order_id,
            'user_id'=>$request->user_id,
            'user_name'=>$request->user_name,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'quantity'=>$request->quantity,
            'total_cost'=>$request->total_cost
        ]);
        
        
        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

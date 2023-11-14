<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function list()
    {
        $carts=Cart::all();
        
        return view('admin.pages.cart.list',compact('carts'));
    }
    public function form()
    {
        return view('admin.pages.cart.form');
    }

    public function store(Request $request)
    {
       //dd($request->all());
       $valided=Validator::make($request->all(),[
        'product_name'=>'required',
        'product_price'=>'required',
        'total_cost'=>'required'
       ]);

       if($valided->fails()){
        return redirect()->back()->witherrors($valided);
       }

        Cart::create([
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'total_cost'=>$request->total_cost
        ]);
        
        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

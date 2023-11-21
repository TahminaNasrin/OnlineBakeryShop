<?php

namespace App\Http\Controllers\Backend;
use App\Models\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function list()
    {
        $customers=Customer::paginate(5);
        
        return view('admin.pages.customer.list',compact('customers'));
    }
    public function form(){

        return view('admin.pages.customer.form'); 
    }
    public function store(Request $request)
    {
        //dd($request->all());
        Customer::create([
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_phoneNo'=>$request->customer_phoneNo,
            'customer_address'=>$request->customer_address
        ]);

        return redirect()->back();
    }
    
}

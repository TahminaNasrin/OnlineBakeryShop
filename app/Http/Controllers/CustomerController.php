<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

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
            'customer_name'=>$request->Customer_Name,
            'email'=>$request->Customer_Email,
            'phoneNo'=>$request->Customer_Phone,
            'address'=>$request->Customer_Address
        ]);

        return redirect()->back();
    }
}

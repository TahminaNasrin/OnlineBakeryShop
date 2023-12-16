<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function list()
    {
        $customers=Customer::paginate(5);
        $customers=User::where('role','customer')->get();
        
        return view('admin.pages.customer.list',compact('customers'));
    }
    // public function form(){

    //     return view('admin.pages.customer.form'); 
    // }
    public function store(Request $request)
    {
        //dd($request->all());
        Customer::create([
            'customer_name'=>$request->name,
            'customer_email'=>$request->email,
            // 'customer_phoneNo'=>$request->phoneNo,
            // 'customer_address'=>$request->address
        ]);

        return redirect()->back();
    }
    
}

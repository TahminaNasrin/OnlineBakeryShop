<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function registration()
    {
        return view('frontend.pages.registration');
    }
    
    
    public function store(Request $request)
    {
        //dd($request->all());
        
        User::create([
            'name' => $request->name,
            'role' => 'customer',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);

        notify()->success('Customer Registration successful.');
        return redirect()->back();
    }

    public function login()
    {
        return view('frontend.pages.login');
    }
}

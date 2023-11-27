<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function registration()
    {
        return view('frontend.pages.registration');
    }
     
    public function profile()
    {
        $orders=Order::where('user_id',auth()->user()->id)->get();
        return view('frontend.pages.profile',compact('orders'));
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

    public function loginPost(Request $request)
    {
        $val=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if ($val->fails())
        {
            notify()->error($val->getMessageBage());
            return redirect()->back();
        }
        $credentials=$request->except('_token');
        //dd($credentials);

        
        if(auth()->attempt($credentials))
        {
            notify()->success('Login Success.');
            return redirect()->route('home');
        }

        notify()->error('Invalid Credentials.');
        return redirect()->back();

    }

    public function logout()
    {
        auth()->logout();
        notify()->success('Logout Successful.');
        return redirect()->back();
    }
}

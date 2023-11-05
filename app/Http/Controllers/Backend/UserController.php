<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginForm()
    {
        return view ('admin.pages.login');
        
    }

    public function loginPost(Request $request)
    {
        //dd($request->all());
        $valided=Validator::make($request->all(),
        [
           'email'=>'required|email',
           'password'=>'required|min:5'
        ]
       );
       if($valided->fails())
       {
        return redirect()->back()->withErrors($valided);
       }
        
       $credentials=$request->except("_token");
       //dd($credentials);

       $login=auth()->attempt($credentials);

       if($login)
       {
        return redirect()->route('admin.dashboard');
       }

       return redirect()->back()->withErrors('Invalid email or password');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}

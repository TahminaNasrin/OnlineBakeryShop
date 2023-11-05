<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginForm()
    {
        return view ('admin.pages.login');
    }

    public function loginPost(Request $request)
    {
        //dd($request->all());
        //$val=>
    }
}

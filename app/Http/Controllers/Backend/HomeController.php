<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){


        $customers=User::where('role','customer')->count();
        $orders=Order::all()->count();
        $pending=Order::where('status','pending')->count();
        $sales=Order::sum('total_price');
        return view('admin.pages.home.home',compact('customers','orders','pending','sales'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list()
    {
        return view('admin.pages.cart.list');
    }
}

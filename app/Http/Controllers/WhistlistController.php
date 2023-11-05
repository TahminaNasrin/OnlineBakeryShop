<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhistlistController extends Controller
{
    public function list()
    {
        return view('admin.pages.whistlist.list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function list()
    {
        return view('admin.pages.report.list');
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function home()
   {
      $categories=Category::all();
      return view('frontend.pages.home',compact('categories'));

   }


   
}

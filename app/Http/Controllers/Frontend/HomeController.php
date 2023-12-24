<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function home()
   {
      // $categories=Category::all();
      // return view('frontend.pages.home',compact('categories'));


      $products = Product::all();
      //dd('Hello Frontend');
      notify()->success('Welcome to Online Shop.');
      return view('frontend.pages.home', compact('products'));
   }
}

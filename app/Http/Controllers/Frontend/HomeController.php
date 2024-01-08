<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
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
      $reviews = Review::all();
      $products = Product::all();
      $customers=User::where('role','customer')->count();
      $orders=Order::all()->count();
      $product=Product::all()->count();
      //dd('Hello Frontend');
      notify()->success('Welcome to Online Shop.');
      return view('frontend.pages.home', compact('products','customers','orders','product','reviews'));
   }
}

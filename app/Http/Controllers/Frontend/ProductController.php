<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function allProduct()
    {
        $products=Product::all();
        return view('frontend.pages.product',compact('products'));
    }

    // public function  singleProductView($productId)
    // {
        

    //     $singleProduct=Product::find($productId);
    //     // dd($singleProduct->name);
    //     return view('frontend.pages.product-view',compact('singleProduct'));

    // }
}

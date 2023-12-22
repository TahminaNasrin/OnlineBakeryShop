<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{


    public function wishlistView($pId)
    {
        $products=Product::find($pId);
        return view('frontend.pages.wishlist',compact('products')); 
    }

    public function wishlist($pId)
    {
       // dd($pId);
        $products=Product::find($pId);
        
        
        notify()->success('Added to Wishlist.');
        return redirect()->back();
        return view('frontend.pages.wishlist',compact('products')); 
    }

    public function delete($id)
    {
        //dd($id);
        $products=Product::find($id);
        //dd($products);
        if($products)
        {
            $products->delete();
        }
        notify()->success('Wishlist Deleted Successfully');

        return redirect()->back();

    }
}

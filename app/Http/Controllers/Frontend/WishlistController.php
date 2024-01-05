<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{


    public function wishlistView($user_id)
    {
        //dd($user_id);
        $wishlist = Wishlist::with('product')->where('user_id', $user_id)->get();
        // dd($count);
        return view('frontend.pages.wishlist', compact('wishlist'));
    }

    public function store($product_id)
    {
        //dd($product_id);
        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product_id,
        ]);
        notify()->success('Product Added to Wishlist Successfully.');
        return redirect()->back();
    }

    public function remove($wishlist_id)
    {
        $product = Wishlist::find($wishlist_id);
        // dd($product);
        if ($product) {
            $product->delete();
        }
        notify()->success('Wishlist Deleted Successfully');
        return redirect()->back();
    }
}

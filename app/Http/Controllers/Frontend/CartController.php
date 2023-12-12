<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cartView()
    {
        return view('frontend.pages.cart');
    }

    public function addToCart($pId)
    {
        //dd($pId);

        $product=Product::find($pId);
        $cart=session()->get('vcart');
        if($cart)//not empty
        {
           if(array_key_exists($pId,$cart)){//yes
                //quantity update
                $cart[$pId]['quantity']=$cart[$pId]['quantity'] + 1;
                $cart[$pId]['subtotal']=$cart[$pId]['quantity'] * $cart[$pId]['price'];

                session()->put('vcart',$cart);
                notify()->success('Quantity updated.');
                return redirect()->back();
           }
           
           else 
           {//add to cart
            $cart[$pId]=[
                'id'=>$pId,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1,
                'subtotal'=>1 * $product->price,
            ];

            session()->put('vcart',$cart);
            notify()->success('Product added to cart successfully.');
            return redirect()->back();

           }
            
            return redirect()->back();
        }

        


        else {//empty hoile
            $newCart[$pId]=[
                'id'=>$pId,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1,
                'subtotal'=>1 * $product->price,

            ];
            session()->put('vcart',$newCart);
            notify()->success('Product added to cart successfully.');
            return redirect()->back();
        }


        return view('frontend.pages.cart');
    }


    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function search(Request $request)
    {
       if($request->search)
       {
        //dd('Here Your Products:');
        $products=Product::where('name','LIKE','%'.$request->search.'%')->get();
       }else
       {
        $products=Product::all();
       }
        
        return view('frontend.pages.search',compact('products'));
    }
    
    public function allProduct()
    {
        $products=Product::all();
        return view('frontend.pages.product',compact('products'));
    }

    public function  singleProductView($productId)
    {
        

        $singleProduct=Product::find($productId);
        //dd($singleProduct->name);
        
       return view('frontend.pages.single-product-view',compact('singleProduct'));

    }

    public function productsUnderCategory($category_name)
    {
        
        $productsUnderCategory=Product::where('category_name',$category_name)->get();
        // $products=Product::whereIn('category_id',[4,5])->get();
        return view('frontend.pages.products-under-category',compact('productsUnderCategory'));
    }


}

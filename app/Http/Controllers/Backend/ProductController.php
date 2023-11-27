<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $products=Product::all();
        return view('admin.pages.product.list',compact('products'));
    }

    public function form()
    {
        return view('admin.pages.product.form');
    }

    public function store(Request $request)
    {
        //dd($request->all());
       $valided=Validator::make($request->all(),[
        'name'=>'required',
        'category_id'=>'required',
        'price'=>'required',
        'stock'=>'required',

       ]);

       if($valided->fails()){
        return redirect()->back()->witherrors($valided);
       }

       $fileName=null;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
           
            $file->storeAs('/uploads',$fileName);

        }

        Product::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'image'=>$fileName,
            'status'=>$request->status,
        ]);
        
        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

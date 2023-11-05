<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories=Category::paginate(5);

        return view('admin.pages.productCategories.list',compact('categories'));
    }
    public function form()
    {
        return view('admin.pages.productCategories.form');
    }
    public function store(Request $request)
    {
       // dd($request->all());

      Category::create([
         'name'=>$request->Category_Name,
         'quantity'=>$request->Category_Quantity,
         'status'=>$request->Category_Status
      ]) ;


     return redirect()->back();
    }
}

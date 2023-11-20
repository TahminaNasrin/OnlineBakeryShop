<?php

namespace App\Http\Controllers\Backend;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories=Category::paginate(5);

        return view('admin.pages.productCategories.list',compact('categories'));
    }


    public function delete($id)
    {
        //dd($id);
        $category=Category::find($id);
        //dd($category);
        if($category)
        {
            $category->delete();
        }
        notify()->success('Categories Deleted Successfully');

        return redirect()->back();

    }

    public function edit($id)
    {
         $category=Category::find($id);
         return view('admin.pages.productCategories.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        if($category)
        {
            $category->update([

            'name'=>$request->Category_Name,
            'quantity'=>$request->Category_Quantity,
            'status'=>$request->Category_Status

            ]);
            
            notify()->success('Categories Updated Successfully.');
            return redirect()->back();
        }

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

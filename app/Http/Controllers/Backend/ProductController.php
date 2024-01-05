<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return view('admin.pages.product.list', compact('products'));
    }

    public function delete($id)
    {
        //dd($id);
        $product = Product::find($id);
        //dd($category);
        if ($product) {
            $product->delete();
        }
        notify()->success('Product Deleted Successfully');

        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.pages.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {

            $fileName = $product->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }
            $product->update([

                'name' => $request->name,
                'category_name' => $request->category_name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                'image' => $fileName,
                'status' => $request->status,

            ]);

            notify()->success('Product Updated Successfully.');
            return redirect()->back();
        }
    }

    public function form()
    {
        $categories = Category::all();
        return view('admin.pages.product.form', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $valided = Validator::make($request->all(), [
            'name' => 'required',

            'category_name' => 'required',
            'price' => 'required',
            'stock' => 'required',

        ]);

        if ($valided->fails()) {
            return redirect()->back()->witherrors($valided);
        }

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('/uploads', $fileName);
        }

        Product::create([
            'name' => $request->name,
            'category_name' => $request->category_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,
        ]);

        notify()->success('Product is successfully Added!');

        return redirect()->back()->witherrors($valided);
    }
}

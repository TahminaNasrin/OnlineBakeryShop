<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use Illuminate\Support\Facades\Validator;

class DeliveryManController extends Controller
{
    public function list()
    {
        $deliveryMans= DeliveryMan::all();
        return view('admin.pages.deliveryMan.list',compact('deliveryMans'));
    }


    public function form()
    {
        
        return view('admin.pages.deliveryMan.form');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $valided = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'area' => 'required',

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

        DeliveryMan::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'area' => $request->area,
            'image' => $fileName,
            
        ]);

        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($valided);
    }
}

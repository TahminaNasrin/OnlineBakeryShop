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


    public function delete($id)
    {
        //dd($id);
        $deliveryMan = DeliveryMan::find($id);
        //dd($deliveryMan);
        if ($deliveryMan) {
            $deliveryMan->delete();
        }
        notify()->success('DeliveryMan Info Deleted Successfully');

        return redirect()->back();
    }

    public function edit($id)
    {
        $deliveryMen = DeliveryMan::find($id);
        return view('admin.pages.deliveryMan.edit', compact('deliveryMen'));
    }

    public function update(Request $request, $id)
    {
        $deliveryMen =DeliveryMan::find($id);

        if ($deliveryMen) {

            $fileName = $deliveryMen->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }
            $deliveryMen->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_no' => $request->mobile_no,
                'area' => $request->area,
                'image' => $fileName,

            ]);

            notify()->success('DeliveryMan Info Updated Successfully.');
            return redirect()->back();
        }
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

        notify()->success('Delivery Man info stored Successfully!');

        return redirect()->back()->witherrors($valided);
    }
}

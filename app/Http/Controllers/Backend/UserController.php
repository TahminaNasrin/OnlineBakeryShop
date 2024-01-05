<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginForm()
    {
        return view ('admin.pages.login');
        
    }

    public function loginPost(Request $request)
    {
        //dd($request->all());
        $valided=Validator::make($request->all(),
        [
           'email'=>'required|email',
           'password'=>'required|min:5'
        ]
       );
       if($valided->fails())
       {
        return redirect()->back()->withErrors($valided);
       }
        
       $credentials=$request->except("_token");
       //dd($credentials);

       $login=auth()->attempt($credentials);

       if($login)
       {
        return redirect()->route('admin.dashboard');
       }

       return redirect()->back()->withErrors('Invalid email or password');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

    public function list()
    {
        $users=User::all();
        //dd($users);
        return view('admin.pages.users.list',compact('users'));
    }

    public function form()
    {
        return view('admin.pages.users.form');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validate=Validator::make($request->all(),[
            'user_name'=>'required',
            'role'=>'required',
            'user_email'=>'required|email',
            'user_password'=>'required|min:5',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->witherrors($validate);
        }

        $fileName=null;
        if($request->hasFile('user_image'))
        {
            $file=$request->file('user_image');
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
           
            $file->storeAs('/uploads',$fileName);

        }

        User::create([
            'name'=>$request->user_name,
            'role'=>$request->role,
            'email'=>$request->user_email,
            'password'=>bcrypt($request->user_password),
            'image'=>$fileName,
            
        ]);

        notify()->success('Laravel Notify is awesome!');

        return redirect()->back()->witherrors($validate);
    }

    public function delete($id)
    {
        //dd($id);
        $users=User::find($id);
        //dd($category);
        if($users)
        {
            $users->delete();
        }
        notify()->success('Users Deleted Successfully');

        return redirect()->back();

    }
}

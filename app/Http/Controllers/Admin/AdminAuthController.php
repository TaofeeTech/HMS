<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin as user;
use Auth;

class AdminAuthController extends Controller
{

    public function Main()
    {

        return view("admin.login");

    }//End Method

    public function Login(Request $request){

        $request->validate([

            "email"=> ["required","email"],
            "password"=> ["required"],

        ], [

            "email.required"=> "Email is required",
            "password.required"=> "Password is required",

        ]);

        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'],'password'=> $check['password']])){

            return redirect()->route('admin.dashboard')->with('mssg','Your Logged In successdully');

        }else{

            return back()->with('mssg', 'Invalid Email or Password');

        }

    }//End Method

    public function AdminIndex()
    {

        return view('admin.index');

    }//End Method

    public function Logout()
    {

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('mssg', 'Your Account is Logged Out');

    }

}

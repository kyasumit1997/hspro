<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class DoctorLoginController extends Controller
{
    public function index()
    {
        return view('doctors/enquiry/login');
    }

    public function Dashboard()
    {
        return view('doctors/enquiry/dashboard');
    }


    public function checkAuth(Request $request)
    {
       
     $request->validate([
         'username'=>'required|email',
         'password'=>'required'
     ]);
 
     //status 2 for doctor
     $user=User::where([['email','=',$request->username],['status','=',2]])->first();
 
     if($user)
     {
         if(Hash::check($request->password,$user->password))
         {
             $request->session()->put('LoginId',$user->id);
             return redirect('Doctors/Login/Dashboard');
         }
         else
         {
             return back()->with('fail','password not matches');
         }
     }
     else
     {
         return back()->with('fail','this email is not registered');
     }
    }

    public function logout()
    {
     
      if(Session::has('LoginId'))
      {
         Session::pull('LoginId');
         return redirect('Doctors/Login/index');
      }
    }

    
}

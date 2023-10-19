<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin/login');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
     
    //     $user=new User;
    //     $user->name="admin";
    //     $user->email="admin@gmail.com";
    //     $user->password=Hash::make("admin");
    //     $user->status=1;
    //     $user->created_at=date('Y-m-d H:i:s');
    //     $user->updated_at=date('Y-m-d H:i:s');
    //     $us=$user->save();
    // }

   public function checkAuth(Request $request)
   {

    $request->validate([
        'username'=>'required|email',
        'password'=>'required'
    ]);

    $user=User::where([['email','=',$request->username],['status','=',1]])->first();

    if($user)
    {
        if(Hash::check($request->password,$user->password))
        {
            $request->session()->put(['loginId'=>$user->id,'userName'=>$user->name]);
            return redirect('AdminLogin/dashboard');
        }
        //g22Mgca8oGGD1Wz1O3hx5IFly4jIg5HvFsuE6KL8EciO2c49pwjJ4AJatJqeG5Xe2b8
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
    
     if(Session::has('loginId'))
     {
        Session::pull('loginId');
        Session::pull('userName');
        return redirect('AdminLogin/index');
     }
   }
   
}

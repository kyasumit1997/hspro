<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Disease;
use Hash;
use Illuminate\Support\Str;
USE Mail;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list()
    {
        // $datas=DB::table('users')->join('diseases', 'users.specialization', '=', 'diseases.id')->get();

        $datas=User::Join('diseases', 'users.specialization', '=', 'diseases.did')->get();
        return view('admin/doctors/doctorsList',['datas'=>$datas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas=Disease::all();
        return view('admin/doctors/addDoctors',['datas'=>$datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'specialization'=>'required'
        ]);


        $password=Str::random(8);

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->specialization=$request->specialization;
        $user->password=Hash::make($password);
        $user->status=2;
        $user->created_at=date('Y-m-d H:i:s');
        $user->updated_at=date('Y-m-d H:i:s');
        $us=$user->save();

        if($us)
        {


        $data=['password'=>$password,'username'=>$request->email];
        $user['to']="sumitsinghrajput56@gmail.com";

        Mail::send('mail',$data,function($messages) use ($user){
            
            $messages->to($user['to']);
            $messages->subject('online cancer treatment login credential');
        });

        
            return redirect('Doctors/list')->with('success', 'data has been saved successfully');
        }
       
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $datas=User::find($id);
        $datas1=Disease::all();
        return view('admin/doctors/editDoctorDetails',['datas'=>$datas,'datas1'=>$datas1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'specialization'=>'required'
        ]);

        DB::table('users')->where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'specialization'=>$request->specialization,
            'updated_at'=>$request->updated_at=date('Y-m-d H:i:s')
        ]);

        return redirect('Doctors/list')->with('success', 'data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user=User::find($id);

        if($user->delete())
        {
            return redirect('Doctors/list')->with('success', 'data has been deleted successfully');
        }
       
    }
}

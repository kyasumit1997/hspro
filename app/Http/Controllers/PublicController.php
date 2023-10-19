<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use App\Models\Enquiry;
use Hash;
use Session;
use File;




class PublicController extends Controller
{
    
    public function index()
    {
        $datas=Disease::all();
        return view('public/public',['datas'=>$datas]);
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'full_name'=>'required|min:3|max:20',
            'password'=>'required|min:8|max:20',
            'emailaddress'=>'required|email|min:5|max:50',
            'phonenumber'=>'required|numeric',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required|min:5|max:40',
            'pincode'=>'required|min:5|max:8',
            'specialization'=>'required',
            'file'=>'required|mimetypes:application/pdf|max:10000'         
        ]);
    

        $ext = $request->file('file')->extension();
        $full_file_name=time().'abcd'.rand(1,18888).'.'.$ext;

        $upload = $request->file('file')->storeAs('public/documents/',$full_file_name);

        if($upload)
        {
            $enquiry=new Enquiry;
            $enquiry->full_name=$request->full_name;
            $enquiry->password=Hash::make($request->password);
            $enquiry->email=$request->emailaddress;
            $enquiry->contact_number=$request->phonenumber;
            $enquiry->state=$request->state;
            $enquiry->city=$request->city;
            $enquiry->address=$request->address;
            $enquiry->pin_code=$request->pincode;
            $enquiry->type_of_cancer=$request->specialization;
            $enquiry->documents=$full_file_name;
            $enquiry->chat_doc_id=0;
            $enquiry->created_at=date('Y-m-d H:i:s');
            $enquiry->updated_at=date('Y-m-d H:i:s');
            $pa=$enquiry->save();

            if($pa)
            {
                return redirect('Public/index')->with('success', 'data has been sent successfully');
            }
            else
            {
                return redirect('Public/index')->with('failed', 'sent failed');
            }



        }
        else
        {
            return redirect('Public/index')->with('failed', 'image cant be uploaded');
        }

    }
}

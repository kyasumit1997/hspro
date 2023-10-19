<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Enquiry;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use PDF;
USE Mail;



class EnquiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctors/index');
    }

    public function list()
    {
        // $datas=Enquiry::join('users','Enquiries.type_of_cancer','=','users.specialization')->get();
        DB::connection()->enableQueryLog();

   
        $datas=DB::table('users')->where('users.id',session('LoginId'))->join('enquiries','users.specialization','=','enquiries.type_of_cancer')->get();

        // $queries = DB::getQueryLog();




    
        return view('doctors/enquiry/enquiriesList',['datas'=>$datas]);


    }

    public function download($id)
    {
        $datas=Enquiry::find($id);
        $file_name=$datas->documents;

        $myFile=storage_path('documents/'.$file_name);

        return response()->file('/var/www/html/example-app/storage/app/public/documents/'.$file_name,['content-type'=>'application/pdf']);
      

        // try{
        //     $datas=Enquiry::find($id);
        //     $file_name=$datas->documents;

        //     $myFile=storage_path('documents/'.$file_name);

        
        //     return response()->download($myFile);
        // }
        // catch(\Exception $e)
        // {
        //     abort(404);
        // }

    }

    public function showPrescription($id)
    {
        
        return view('doctors/enquiry/prescription',['id'=>$id]);
    }


    //https://youtu.be/140dAiIMk8o?si=gepOYqG8D1zY9m_H

    public function storePrescription(Request $request)
    {

        


        $request->validate([
            'title'=>'required',
            'description'=>'required',

        ]);

        $id=$request->enquiry_id;
        $description = $request->description;
        $title=$request->title;


        $fileName=time().'abc'.rand(1,100).'.pdf';
        $pdf = PDF::loadView('pdf_view',compact('description','title'));
        file_put_contents(public_path('media/'.$fileName), $pdf->output());


        $prescription=new Prescription;
        $prescription->doctor_id=session('LoginId');
        $prescription->enquiry_id=$id;
        $prescription->created_at=date('Y-m-d H:i:s');
        $prescription->updated_at=date('Y-m-d H:i:s');
        $prescription->prescription_file_name_=$fileName;
        $pre=$prescription->save();

        if($pre)
        {

            $enquery=Enquiry::find($request->enquiry_id);
            $enquery->chat_doc_id=session('LoginId');
            $enquery->updated_at=date('Y-m-d H:i:s');
            $update=$enquery->save();


            if($update)
            {
                $data=User::find(session('LoginId'));
                $data=['doctorsName'=>$data->name];
                $user['to']="sumitsinghrajput56@gmail.com";
    
                Mail::send('prescriptionMail',$data,function($messages) use ($user,$pdf,$fileName){
                $messages->to($user['to']);
                $messages->subject('online cancer treatment login credential');
                $messages->attachData($pdf->output(),$fileName);

            });
            }

    
            return redirect('Enquiry/list')->with('success', 'data has been sent successfully');
        }


        // dd($users);
        // view()->share('users',$users);
        // $pdf=PDF::loadView('pdf_view',compact('users'));

       
    
        // dd($request->description);

        // if($request->hasFile('upload'))
        // {
        //     $originName=$request->file('upload')->getClientOriginalName();
        //     $fileName=pathinfo($originName,PATHINFO_FILENAME);
        //     $extension=$request->file('upload')->getClientOriginalExtension();
        //     $filename=$filename.'_'.time().'.'.$extension;
        //     $request->file('upload')->move(public_path('media'),$fileName);
        //     $url=asset('media/',$fileName);
        //     return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
        // }




    }

   


   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Disease;

class CancerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('admin/cancerType/index');
    // }
    public function list()
    {
        $datas=Disease::all();
        return view('admin/cancerType/cancerList',['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cancerType/addCancerType');
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
            'cancer_type'=>'required|unique:diseases,cancer_type'
        ]);

        $disease=new Disease;
        $disease->cancer_type=$request->cancer_type;
        $disease->created_at=date('Y-m-d H:i:s');
        $disease->updated_at=date('Y-m-d H:i:s');
        $disease->save();

        return redirect('cancerType/list')->with('success', 'data has been saved successfully');
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
        $datas=Disease::where('did',$id)->first();

      
     

        return view('admin/cancerType/editCancerType',['datas'=>$datas]);

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
            'cancer_type'=>'required|unique:diseases,cancer_type'
        ]);

        DB::table('diseases')->where('did',$request->id)->update([
            'cancer_type'=>$request->cancer_type
        ]);


        // $disease=Disease::where('did',$request->id)->first();
        // $disease->cancer_type=$request->cancer_type;
        // $disease->save();

        return redirect('cancerType/list')->with('success', 'data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disease=Disease::where('did',$id);
        
        if($disease->delete())
        {
            return redirect('cancerType/list')->with('success', 'data has been deleted successfully');
        }
    }
}

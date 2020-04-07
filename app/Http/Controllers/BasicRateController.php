<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BasicRate;

class BasicRateController extends Controller
{
    public function BasicRateInsert(Request $request){

        $Eq = new BasicRate();
        $Eq->Subject = $request->input('Subject');
        if($Eq->save()){
            return back()->with('success','Flight created successfully!');
        }else{
            return back()->with('errors','Woops , Something is Worng');
        }
    }

    public function ViewTblBasicRate(){
        $data = BasicRate::all();
        return view('layouts.includes.WorkOrder.BasicRate',['Eqdata'=>$data]);

    }
}

<?php

namespace App\Http\Controllers;

use App\ShareAirportSetting;
use Illuminate\Http\Request;
use DB;
use App\AircraftType;
use App\ShareLatterAirport;


class ShareAirportSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = $_GET['id'];
        $type = AircraftType::all();
         $st =  DB::select(DB::raw("(SELECT * FROM `stations` WHERE Symbol NOT IN(select Station from share_airport_settings where id_ShareLetter= $id) )"));
         $st_head = DB::select(DB::raw("( SELECT DISTINCT(`Station`) FROM `share_airport_settings` where id_Shareletter = $id)"));
         $tbl = ShareLatterAirport::where('id',$id)->first();
        $tbl_data =  ShareAirportSetting::where('id_Shareletter',$id)->get();
        return view('layouts.includes.BaseInfo.ShareAirportSetting',['data'=>$tbl,'station'=>$st,'tdata'=>$tbl_data,'TypeAc'=>$type,'Sthead'=>$st_head]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $st = $request->check_list ;
        $type = AircraftType::all();  

        
        for($i= 0 ;$i<(count($st));$i++){

        foreach($type as $list){
             $tlst = $list->Type .'-'.$list->SubGroup ;
                DB::table('share_airport_settings')->insert(
                array('id_ShareLetter'=>$request->input('id'),'Station'=>$st[$i],'Type'=>$tlst));
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ShareAirportSetting $shareAirportSetting)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareAirportSetting $shareAirportSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$_GET['id'];
        $tbl = ShareAirportSetting::where('id_Shareletter',$id)->first();
                $tbl->Price = $request->input('Price');
       if( $tbl->update()){
            return back()->with('success','Price Saved successfully!');
                }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareAirportSetting $shareAirportSetting)
    {
        //
    }
}

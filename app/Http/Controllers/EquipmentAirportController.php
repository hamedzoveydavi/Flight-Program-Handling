<?php

namespace App\Http\Controllers;

use App\ArrdepInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\EquipmentAirport;
use DB;
use App\Http\Requests\EquipmentAirportRequest;

class EquipmentAirportController extends Controller
{
    public function EquipmentAirportInsert(EquipmentAirportRequest $request)
    {

        $table = new EquipmentAirport();

        $query = $table::where ('Flightid',$request->input('Flightid'))->select(1)->count();
             if ($query > 0) {
              return back()->with('Duplicate', 'Woops , This record has already been saved');
        } else {

            $table->Flightid = $request->input('Flightid');
            $table->GHCN_NO = $request->input('Ghcn');
            $table->BasicRateid = $request->input('BasicRateid');
            $table->BasicServices = 'a'; /*$request->get('$checklist');*/
            $table->CrewCare = $request->input('CrewCare');
            $table->CrewCareTime = $request->input('CrewCareTime');
            $table->PaxCoach = $request->input('PaxCoach');
            $table->PaxCoachTime=$request->input('PaxCoachTime');
            $table->LOM = $request->input('LOM');
            $table->LOMTime = $request->input('LOMTime');
            $table->bmc = $request->input('bmc');
            $table->bmcTime = $request->input('bmcTime');
            $table->vipcar = $request->input('vipcar');
            $table->vipcarTime = $request->input('vipcarTime');
            $table->wch = $request->input('wch');
            $table->wchTime = $request->input('wchTime');
            $table->Gpu = $request->input('Gpu');
            $table->GpuTime= $request->input('GpuTime');
            $table->Acu = $request->input('Acu');
            $table->AcuTime = $request->input('AcuTime');
            $table->Asu = $request->input('Asu');
            $table->AsuTime = $request->input('AsuTime');
            $table->PushBack = $request->input('PushBack');
            $table->PushBackTime = $request->input('PushBackTime');
            $table->cpl = $request->input('cpl');
            $table->cplTime = $request->input('cplTime');
            $table->Liftruck = $request->input('Liftruck');
            $table->LiftruckTime = $request->input('LiftruckTime');
            $table->TowTractor = $request->input('TowTractor');
            $table->TowTractorTime = $request->input('TowTractorTime');
            $table->towbar = $request->input('towbar');
            $table->towbarTime = $request->input('towbarTime');
            $table->Belt = $request->input('Belt');
            $table->BeltTime = $request->input('BeltTime');
            $table->Lsu = $request->input('Lsu');
            $table->LsuTime = $request->input('LsuTime');
            $table->Wsu = $request->input('Wsu');
            $table->WsuTime = $request->input('WsuTime');
            $table->PaxStep = $request->input('PaxStep');
            $table->PaxStepTime = $request->input('PaxStepTime');
            $table->BaggageTrailer = $request->input('BaggageTrailer');
            $table->BaggageTrailerTime = $request->input('BaggageTrailerTime');
            $table->CateringLift = $request->input('CateringLift');
            $table->CateringLiftTime = $request->input('CateringLiftTime');
            $table->Stretcher = $request->input('Stretcher');
            $table->StretcherTime = $request->input('StretcherTime');
            $table->ManPower = $request->input('ManPower');
            $table->ManPowerTime = $request->input('ManPowerTime');
            $table->Headset = $request->input('Headset');
            $table->HeadsetTime = $request->input('HeadsetTime');
            $table->Chocks = $request->input('Chocks');
            $table->ChocksTime = $request->input('ChocksTime');
            $table->Deicer = $request->input('Deicer');
            $table->DeicerTime = $request->input('Deicefluid');
            $table->Deicefluid = $request->input('Deicer');
            $table->DeicefluidTime = $request->input('DeicefluidTime');
            $table->Remark = $request->input('Remark');

            if ($table->save()) {
                return redirect()->route('FlightClosed')->withSuccessMessage(__('msg.Success'));
            } else {
                return back()->withErrorMessage(__('msg.Error'));
            }
        }
    }


        public function ViewTblEquipmentAirport(){
        $Eq = EquipmentAirport::all();
              return view('layouts.includes.WorkOrder.ViewTblGhcn',['data'=>$Eq]);
        }

        public function SelectFlightClosed(){
        $q = ArrdepInfo::where('id',$_GET['id'])->first();

        return view('layouts.includes.WorkOrder.EquipmentFlight',['flt'=>$q]);
        }


        public function ViewEquipmentForFlight(){
        $EQ =DB::select(DB::raw("(SELECT b.Airline,b.Arrival,b.From,b.To,b.Arr_No,b.Dep_No,b.Reg,b.ATA,b.ATD,a.* FROM equipment_airports a ,arrdep_infos b
                where b.id=a.Flightid)"));
       return view('layouts.includes.WorkOrder.ViewEquipment',['eqs'=>$EQ]);
        }


}

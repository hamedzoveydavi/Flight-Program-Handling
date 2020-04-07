@extends('layouts.app')

@section('content')
<style>
    .eq{
        border-radius: 3px;
        border: 1px black solid;
        padding: 1px 2px 1px 2px;
        margin-right: 2px;

    }
    .fltinfo{
        background-color: orange;
        width: 25%;
        border-radius: 2px;
        /*box-shadow: 2px 6px 4px #888888;*/
        font:16px bold;
        padding-right: 2px;
        }
    .eqtitel{
        background-color: #95999c;
        font:16px bold;
        padding: 1px 2px 1px 1px;
        border-radius: 3px;
        margin-left: 3px;

    }
    .eqno{
        border-radius: 10px;
        border: 1px solid black;
        text-align: center;
    }
</style>
    @foreach($eqs as $eq)
        <div class="groupbox-shadow" style="padding-bottom:5px">

    <span class="eqtitel">Station :</span>
    <span class="fltinfo">{{$eq->From}}</span>
            <span class="eqtitel">GHCN NO :</span>
            <span class="fltinfo">{{$eq->GHCN_NO}}</span>
            <br>
    <span class="eqtitel">Airline :</span>
    <span class="fltinfo">{{$eq->Airline}}</span>
    <span class="eqtitel">Reg.Mark :</span>
    <span class="fltinfo">{{$eq->Reg}}</span>
    <br>
    <span class="eqtitel" >BasicServices :</span>
    <span class="fltinfo">
       @switch($eq->BasicServices)
           @case('a') passenger Aircraft
           @break
           @case('b') Combined passenger and cargo
           @break
           @case('c') Cargo Aircraft
           @break
           @case('d') Technical Landing / ramp Handling
           @break
           @case('e') Night
           @break
           @case('f') Holiday
           @break
        @endswitch
        </span>
    <span class="eqtitel" >Basic Rate :</span>
    <span class="fltinfo">{{$eq->BasicRateid}}</span><br>
    @if(!empty($eq->CrewCare))
        <span class="eq">
        CrewCare :<span class="eqno"> {{$eq->CrewCare}} </span> @if(!empty($eq->CrewCareTime)): {{$eq->CrewCareTime}} Min @endif
            </span>
    @endif
    @if(!empty($eq->PaxCoach))
        <span class="eq">
            PaxCoach :<span class="eqno"> {{$eq->PaxCoach}}</span> @if(!empty($eq->PaxCoachTime)) : {{$eq->PaxCoachTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->LOM))
        <span class="eq">
            LOM : <span class="eqno">{{$eq->LOM}}</span> @if(!empty($eq->LOMTime)) : {{$eq->LOMTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->bmc))
        <span class="eq">
            bmc :<span class="eqno"> {{$eq->bmc}}</span> @if(!empty($eq->bmcTime)) : {{$eq->bmcTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->vipcar))
        <span class="eq">
            vipcar : <span class="eqno">{{$eq->vipcar}}</span> @if(!empty($eq->vipcarTime)) : {{$eq->vipcarTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->wch))
        <span class="eq">
            wch : <span class="eqno">{{$eq->wch}}</span> @if(!empty($eq->wchTime)) : {{$eq->wchTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Gpu))
        <span class="eq">
            Gpu :<span class="eqno"> {{$eq->Gpu}}</span> @if(!empty($eq->GpuTime)) : {{$eq->GpuTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Acu))
        <span class="eq">
            Acu : <span class="eqno">{{$eq->Acu}}</span> @if(!empty($eq->AcuTime)) : {{$eq->AcuTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->PushBack))
        <span class="eq">
            PushBack :<span class="eqno"> {{$eq->PushBack}}</span> @if(!empty($eq->PushBackTime)) : {{$eq->PushBackTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->cpl))
        <span class="eq">
        cpl : {{$eq->cpl}} @if(!empty($eq->cplTime)) : {{$eq->cplTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Liftruck))
        <span class="eq">
            Liftruck :<span class="eqno"> {{$eq->Liftruck}}</span> @if(!empty($eq->LiftruckTime)) : {{$eq->LiftruckTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->TowTractor))
        <span class="eq">
            TowTractor :<span class="eqno"> {{$eq->TowTractor}}</span> @if(!empty($eq->TowTractorTime)) : {{$eq->TowTractorTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->towbar))
        <span class="eq">
            towbar :<span class="eqno"> {{$eq->towbar}}</span> @if(!empty($eq->towbarTime)) : {{$eq->towbarTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Belt))
        <span class="eq">
            Belt :<span class="eqno"> {{$eq->Belt}}</span> @if(!empty($eq->BeltTime)) : {{$eq->BeltTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Lsu))
        <span class="eq">
            Lsu :<span class="eqno"> {{$eq->Lsu}}</span> @if(!empty($eq->LsuTime)) : {{$eq->LsuTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Wsu))
        <span class="eq">
            Wsu :<span class="eqno"> {{$eq->Wsu}}</span> @if(!empty($eq->WsuTime)) : {{$eq->WsuTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->PaxStep))
        <span class="eq">
            PaxStep :<span class="eqno"> {{$eq->PaxStep}}</span> @if(!empty($eq->PaxStepTime)) : {{$eq->PaxStepTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->BaggageTrailer))
        <span class="eq">
            BaggageTrailer :<span class="eqno"> {{$eq->BaggageTrailer}}</span> @if(!empty($eq->BaggageTrailerTime)) : {{$eq->BaggageTrailerTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->CateringLift))
        <span class="eq">
            CateringLift :<span class="eqno"> {{$eq->CateringLift}}</span> @if(!empty($eq->CateringLiftTime)) : {{$eq->CateringLiftTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Stretcher))
        <span class="eq">
            Stretcher :<span class="eqno"> {{$eq->Stretcher}}</span> @if(!empty($eq->StretcherTime)) : {{$eq->StretcherTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->ManPower))
        <span class="eq">
            ManPower :<span class="eqno"> {{$eq->ManPower}}</span> @if(!empty($eq->ManPowerTime)) : {{$eq->ManPowerTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Chocks))
        <span class="eq">
            Chocks :<span class="eqno"> {{$eq->Chocks}}</span> @if(!empty($eq->ChocksTime)) : {{$eq->ChocksTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Headset))
        <span class="eq">
            Headset :<span class="eqno"> {{$eq->Headset}}</span> @if(!empty($eq->HeadsetTime)) : {{$eq->HeadsetTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Deicer))
        <span class="eq">
            Deicer :<span class="eqno"> {{$eq->Deicer}}</span> @if(!empty($eq->DeicerTime)) : {{$eq->DeicerTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Deicefluid))
        <span class="eq">
            Deicefluid :<span class="eqno"> {{$eq->Deicefluid}}</span> @if(!empty($eq->DeicefluidTime)) : {{$eq->DeicefluidTime}} Min @endif
    </span>
    @endif
    @if(!empty($eq->Remark))
        <span class="eq" style="background-color:green">
        Remark : {{$eq->Remark}}
    </span>
    @endif


</div><br>


    @endforeach

@endsection()

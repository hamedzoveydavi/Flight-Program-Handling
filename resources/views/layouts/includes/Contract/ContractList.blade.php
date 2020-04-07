@extends('layouts.app')
@section('content')
<style>
     


        .btn {
            background-color: DodgerBlue; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }

     
    </style>




<?php 

function MiladiToShamsi($gy,$gm,$gd,$mod='-'){
    $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
    if($gy>1600){
     $jy=979;
     $gy-=1600;
    }else{
     $jy=0;
     $gy-=621;
    }
    $gy2=($gm>2)?($gy+1):$gy;
    $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
    $jy+=33*((int)($days/12053)); 
    $days%=12053;
    $jy+=4*((int)($days/1461));
    $days%=1461;
    if($days > 365){
     $jy+=(int)(($days-1)/365);
     $days=($days-1)%365;
    }
    $jm=($days < 186)?1+(int)($days/31):7+(int)(($days-186)/30);
    $jd=1+(($days < 186)?($days%31):(($days-186)%30));
    return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
   }

   
    function DateSplit($date){
    $y = substr($date,0,4);
    $m = substr($date,5,2);
    $d = substr($date,8,2);
   return $dateResult = MiladiToShamsi($y,$m,$d);
    
   }
  

?>

<table>
    <thead>
        <th>ContractNum</th>
        <th>Airline</th>
        <th>Symbol</th>
        <th>StartDate</th>
        <th>EndDate</th>
        <th>details</th>
    </thead>
    <tbody>
    @foreach($CnList as $list)
            <tr>
            <td>{{$list->ContractNum}}</td>
            <td>{{$list->AirLine}}</td>
            <td>{{$list->Symbol}}</td>
            <td><span style="background-color:#ff751a">EN :{{$list->StartDate}} </span> &nbsp; <span style="background-color: #47d147"> FA :{{DateSplit($list->StartDate)}}</span></td>
            <td><span style="background-color:#ff751a">EN :{{$list->EndDate}}</span>&nbsp; <span style="background-color: #47d147"> FA :{{DateSplit($list->EndDate)}}</span></td>
            <td><a  class="btn" style="width: 280px;height: 40px" href="{{Route('ctitem',['ContractNum'=>$list->ContractNum])}}">
                        <i class="fa fa-plus"></i>   <i> details</i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>





@endsection
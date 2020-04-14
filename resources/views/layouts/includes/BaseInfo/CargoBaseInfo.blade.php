@extends('layouts.app')
@section('content')


    <div class="FormContiner" >
        <div id="ContractHeader"> Cargo Pay</div>


        <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
            <div  class="input-group-prepend">

                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >Type</label>
            </div>
            <input id="Type" style="text-align: center" type="text" class="form-control @error('Type') is-invalid @enderror"  name="Type"
                   value="<?php if(!empty($Mingt)){ echo $Mingt->Type ; } ?>"   REQUIRED>
            @error('Type')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
            @enderror
        </div>



        <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
            <div  class="input-group-prepend">

                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >Type</label>
            </div>
            <input id="Type" style="text-align: center" type="text" class="form-control @error('Type') is-invalid @enderror"  name="Type"
                   value="<?php if(!empty($Mingt)){ echo $Mingt->Type ; } ?>"   REQUIRED>
            @error('Type')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
            @enderror
        </div>



        <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
            <div  class="input-group-prepend">

                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >Type</label>
            </div>
            <input id="Type" style="text-align: center" type="text" class="form-control @error('Type') is-invalid @enderror"  name="Type"
                   value="<?php if(!empty($Mingt)){ echo $Mingt->Type ; } ?>"   REQUIRED>
            @error('Type')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
            @enderror
        </div>





    </div>


@endsection

<link rel="stylesheet" href="{{asset ('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    .HeadItem{
        width: 97%;
        height: 25px;
        border: 1px solid black;
        border-radius:5px;
        background-color:silver;
    }

    .Sidbardata{
        width: 250px;
        height: 400px;
        margin-top: 10px;
        padding:5px 5px 5px 5px;

    }
    .BasicRate{
        width: auto;
        padding: 5px 5px 5px 5px;
        overflow-y:auto;
    }
    .container{
        width: 90%;
        height: auto;
        text-align: center;
        padding: 5px 5px 5px 5px;
        border-radius: 3px;
    }
    html, body {
        overflow: visible;
    }

</style>




<div class="container">
    {{--------------------------------start row---------------------------------------------------}}
    <div class="divTableRow">
        {{--------------------------------start cell---------------------------------------------------}}
        <div class="divTableCell" >
            {{-----------------------------------------------------------------------------------}}
            @if(!empty($Sthead))

                @foreach($Sthead as $stlist)
            <div class="groupbox-shadow BasicRate" >
                                     
                         <div id="ContractHeader"> Station : {{$stlist->Station}} </div>
              <table>
                      <tbody>

                        @foreach($tdata as $list)
                      
                      @if($list->Station == $stlist->Station)
                            <tr>
                                 <form method="post" action="{{Route('ShareSettingUpdate',['id'=>$list->id])}}">
                                        @csrf
                              
                                        <td style="direction: rtl" >
                                            <div >
                                                                                         
                                                   <div class="divTableRow">
                                                        <div class="divTableCell">
                                                           <input name="Type" type="text"  value="{{$list->Type}}@if(!empty($list->SubGroup))-{{$list->SubGroup}} @endif"  > <br>
                                                        </div>
                                                        <div class="divTableCell" >
                                                            <input type="text" name="Price" style="border: 1px solid black;text-align: center" placeholder="400,000">
                                                        </div>

                                                        <div class="divTableCell" >
                                                            <button class="btn-success"><i class="fa fa-save"></i></button>
                                                        </div>
                                                        <div class="divTableCell" >
                                                            <button class="btn-danger"><i class="fa fa-times-circle"></i></button>
                                                        </div>

                                                    </div>
                                               </div>
                                        </td>
                                 </form>
                                 </tr>
                                 @endif
                        @endforeach
                       </tbody>
                  </table>
            </div>
            <br>
               @endforeach
               


           @endif
            {{-----------------------------------------------------------------------------------}}
        </div>
        {{--------------------------------end cell---------------------------------------------------}}
         <form method="post" action="{{Route('ShareSettingStore')}}" >
            @csrf
            {{--------------------------------start cell---------------------------------------------------}}
             <div class="divTableCell" >
             {{-----------------------------------------------------------------------------------}}
                 <div class="groupbox-shadow Sidbardata" >
                    <div class="groupbox-shadow" style="text-align: left;height: 22%">
                             <input name="id" type="text" value="{{$data->id}}" style="display:none">
                            <div name="LetteNum" class="HeadItem" style="margin-bottom: 10px ">Latter Number :  {{$data->LatterNum}}</div>
                            <div class="HeadItem" >Issue Date :{{$data->Date}}</div>
                    </div>
                    <br>
            {{-----------------------------------------------------------------------------------}}
                    <div class="groupbox-shadow" style="padding: 0">
                        <div id="ContractHeader" style="margin-bottom: 10px;border-radius: 3px"> Station</div>
                             @foreach($station as $list)
                                <div style="margin-right: 15px">
                                    <input type="checkbox" name="check_list[]" value="{{$list->Symbol}}">   {{$list->Symbol}} <br>
                                </div>
                             @endforeach
                         <br>
                            <div style="margin-bottom: 7px;text-align: center">
                                <button type="submit" class="btn btn-success" style="width: 97%;"> <i class="fa fa-mail-reply-all"></i> <i>Send</i></button>
                            </div>
                    </div>
            {{-----------------------------------------------------------------------------------}}
                </div>
            {{--------------------------------end cell---------------------------------------------------}}
             </div>
        </form>

    </div>
    {{--------------------------------end row---------------------------------------------------}}
</div>






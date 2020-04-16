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
    .HeadSetting{
        width: 85%; 
       height: 10%;
       margin-left = 10px;!imprtant;
    }
    .HeadItem{
            width: 100px; 
            height: 20px;
             border: 1px solid black;
             border-radius:5px;
             background-color:silver;
        }

        .Sidbardata{
            width: 200px; 
            height: 600px;
            
        }
        .BasicRate{

            width: 600px; 
           
        }

</style>

<div class="groupbox-shadow HeadSetting" style="margin-top: 10px" >
<span class="HeadItem">Latter Number :   {{$data->LatterNum}} <span>         
<span class="HeadItem">Issue Date :{{$data->Date}}</span> 
</div>

<div class="divTableRow">
            <div class="divTableCell" >
 

<div class="groupbox-shadow Sidbardata" style="margin-top: 10px;padding:5px 5px 5px 5px;" >
<table>
<tbody>
@foreach($station as $list)
<tr>
<td>
{{$list->Symbol}}
</td>
<td><button>+</button></td>
</tr>
@endforeach
</tbody>

</table>
</div>

</div>
        <div class="divTableCell" >
                <div class="groupbox-shadow BasicRate" >
                @foreach($basicrate as $listbr)
                {{$listbr->Subject}}
                {{$listbr->Precent}}<br>
                @endforeach
                </div>

        </div>
</div>


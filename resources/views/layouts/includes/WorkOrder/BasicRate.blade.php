@extends('layouts.app')

@section('content')
    <style>
        .groupbox-shadow{
            border: #95999c;
            border-radius: 5px  ;
            border-style: solid;
            border-width: 1px;
            box-shadow: 5px 10px 8px #888888;
            padding-top: 10px;
            padding-left: 5px;

        }
    </style>
    <div class="groupbox-shadow">
        <form method="post" action="{{Route('BasicRateInsert')}}">
            @csrf
            @include('layouts.includes.flash-message')

            @component('components.textCoor',[
                   'name'=>'Subject',
                   'is_insert'=>true
                    ])
            @endcomponent

            <div style="margin-left: 70px;padding-bottom: 10px">
                <button type="submit" class="btn" style="background-color: green">Save Flight</button>
            </div>
        </form>
    </div>
    <br>
    <table style="width: 100%;text-align: center"  class="table table-bordered table-hover">
        <thead class="table-primary" >
        <tr>
            <th scope="col">Action</th>
            <th scope="col">Subject</th>
            <th scope="row">No</th>
        </tr>
        </thead>
        <tbody>

        @foreach( $Eqdata as $c)
            <tr>
                <td><a> Edit  </a></td>
                <td style="text-align: right">{{ $c->Subject }}</td>
                <td>{{ $c->id }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

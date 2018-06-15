@extends('layouts.start')

@section('content')

<!--
@ php(dd($detVeran->veranAufschrift))
-->
<div class="container"> 
    <div class="card" >
        <div class="card-header text-center">
                <h2>{{ $detVeran->veranAufschrift }}</h2>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-center">{{ $detVeran->veranDetailtext }} </li>
            <li class="list-group-item"><b>@lang('welcomepage.sportart') :</b> {{ $detVeran->sportart->sportartsName }}</li>
            <li class="list-group-item"><b>@lang('welcomepage.am') </b>{{ date('d.m.Y', strtotime($detVeran->veranVon)) }} <b>@lang('welcomepage.von')</b> {{ date('H:i', strtotime($detVeran->veranVon)) }} <b>@lang('welcomepage.bis')</b> {{ date('H:i', strtotime($detVeran->veranTo)) }}</li>
            <li class="list-group-item">
                <b> @lang('welcomepage.adresse'): </b>{{ $detVeran->veranAdresse }} <br>
                @lang('welcomepage.in') {{ $detVeran->Stadt->stadtName }}, {{ $detVeran->Land->landName }}
            </li>
          <li class="list-group-item"><b>@lang('welcomepage.spielstärke')(1-10): </b>{{ $detVeran->veranMinstaerke }} @lang('welcomepage.bis') {{ $detVeran->veranMaxstaerke }} </li>
          <li class="list-group-item"><b> @lang('welcomepage.organisator'): </b>{{$detVeran->organisator->name}} </li>
          <li class="list-group-item">Vestibulum at</li>
          <li class="list-group-item">Vestibulum at </li>
        </ul>
      
    </div>
</div>

<div class="container">
    <h3>Es sind nur noch 3 Plätze frei!</h3>
    <p>   Um Teilzunehmen, muss du registriert und eingelogt sein. Registrieren link->...</p>
</div>
@endsection
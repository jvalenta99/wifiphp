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
              <li class="list-group-item">
                <form method="post" class = "card-text" action="{{ route('mitspieler.store') }}">
                    {{csrf_field()}}
                        <input type="hidden" name="veran_FK" value="{{ $detVeran->veran_ID }}">
                        <input type="hidden" name="status_FK" value="1">
                        
                        <button type="submit" class="btn btn-primary">Ich will teilnehmen</button>
                </form>

              </li>
              
            </ul>
          
        </div>
    </div>
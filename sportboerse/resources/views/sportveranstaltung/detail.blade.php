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
              <li class="list-group-item"><b>Maximale Anzahl der Teilnehmer: </b>{{ $detVeran->veranMaxTeilnehmer }} </li>
              <li class="list-group-item"><b>Angemeldete Mitspieler: 
                  </b>{{ App\Mitspieler::where('veran_FK',$detVeran->veran_ID)->count() }} 
              </li>
                
                @if (Auth::check())
                    <li class="list-group-item">
                        
                        <form method="post" class = "card-text" action="{{ route('meinSpielplan.store') }}">
                            {{csrf_field()}}
                            <input type="hidden" name="veran_FK" value="{{ $detVeran->veran_ID }}">
                            <input type="hidden" name="status_FK" value="1">
                            
                            @if( App\Mitspieler::where('veran_FK',$detVeran->veran_ID)
                                ->where('benut_FK',Auth::id())
                                ->count() >0) 
                                <h4 class="text-danger">  Du bist bei dieser Sportveranstaltung bereits angemeldet!</h4> 
                            @else
                                
                                @if( $detVeran->veranOrganisator_FK==Auth::id())
                                
                                @else
                                    <button type="submit" class="btn btn-primary">Teilnehmen >></button>
                                @endif 
                            @endif 
                        
                        </form>
                    </li>
                @endif
              
              
            </ul>
          
        </div>
    </div>
    @if (count($allMitspieler) > 0)   
    <div class="m-5">
            <div class="container  ">
                <h3 class="jumbotron-heading text-center ">Mitspieler</h3>
                <!-- Example row of columns -->  
            
            </div> <!-- /container -->
        </div>
    
        <hr>

    <div class="container "> 
        <div class="row">      
             
                    @foreach ($allMitspieler as $mitsp)
                        <div class="col-md-4 ">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h4>{{ $mitsp->user->name }}</h4>
                                    <h5>{{ $mitsp->user->email }}</h5>
                                </div>
                            </div>
                            <hr class="my-4">
                        </div>                    
                    @endforeach              
                   
        </div> <!-- /.row -->
        
    </div> <!-- /.container -->
    @endif
    
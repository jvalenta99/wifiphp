@extends('layouts.start')

@section('content')
<div class="jumbotron">
        <div class="container">
        <h1 class="display-3">@lang("welcomepage.jumbotitle")</h1>
          <p>@lang("welcomepage.jumboparagraph") </p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">@lang("welcomepage.registrieren") &raquo;</a></p>
        </div>
 </div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">@lang("welcomepage.sportveranstaltungen")</div>

                <div class="panel-body text-center">
                    
                    
                    Suchparameter<br>
                    Land, Stadt, von, bis<br>
                    
                </div>
                <div class="panel-body text-center">
                                        
                    Ergebnisstabelle mit veranstaltungen<br>

                    <a href='/verandet'>25.6.2018 von 17:00 bis 19:00; Österreich; Wien; Ortdetail: ogugasse 15, 1220 wien</a>
                    <br>
                    <a href='/verandet'>26.6.2018 von 18:00 bis 20:00; Österreich; Wien; Ortdetail: ogugasse 15, 1220 wien</a>
                    <br>

                    beim klicken öffnet sich detailansicht<br>
                    todo: suchkriterien im header,tabelle formatieren<br>
                    asdfasdfasdf<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

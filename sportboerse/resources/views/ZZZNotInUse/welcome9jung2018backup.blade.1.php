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

    <h1 class="jumbotron-heading">@lang("welcomepage.listeheader")</h1>
    <!-- Example row of columns -->  
    <div class="row">
        alleVeranstaltungen
        @if (count($allVeran) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($allVeran as $veran)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div>{{ $veran->veranAufschrift }} im Land:{{ $veran->Land->landName }} </div>
                                    </td>

                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif  


        
        
        
        
        
        
        
        
        
        
        <div class="col-md-4">
            <h3>Heading</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Heading</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Heading</h3>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>
</div> <!-- /container -->

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

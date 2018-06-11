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
            
            @if (count($allVeran) > 0)
        
                    @foreach ($allVeran as $veran)
                        <div class="col-md-4  border border-success">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h5>{{ $veran->veranVon }}</h5>
                                    <h3>{{ $veran->veranAufschrift }}</h3>
                                    <p>{{ $veran->veranDetailtext }}</p>
                                    <p><a class="btn btn-secondary" href="#" role="button">@lang("welcomepage.viewdetails") &raquo;</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
                <hr>
                    
            @endif
            
        </div>

        <hr>
    </div> <!-- /container -->

   
@endsection

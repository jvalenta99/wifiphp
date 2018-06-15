@extends('layouts.start')

@section('content')
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">@lang("welcomepage.jumbotitle")</h1>
          <p>@lang("welcomepage.jumboparagraph") </p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">@lang("welcomepage.registrieren") &raquo;</a></p>
        </div>
    </div>

 

    <div class="m-5">
        <div class="container  ">
            <h1 class="jumbotron-heading text-center ">@lang("welcomepage.listeheader")</h1>
            <!-- Example row of columns -->  
        
        </div> <!-- /container -->
    </div>

    <hr>

    <div class="container "> 
        <div class="row">      
            @if (count($allVeran) > 0)    
                    @foreach ($allVeran as $veran)
                        <div class="col-md-4 ">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h5 class="text-primary">{{ date('d.m.Y', strtotime($veran->veranVon)) }} <b>@lang('welcomepage.von')</b> {{ date('H:i', strtotime($veran->veranVon)) }} <b>@lang('welcomepage.bis')</b> {{ date('H:i', strtotime($veran->veranTo)) }}</h5>
                                    <h3>{{ $veran->veranAufschrift }}</h3>
                                    <p>{{ $veran->veranDetailtext }}</p>
                                    <p>@lang('welcomepage.in') {{ $veran->Stadt->stadtName }}, {{ $veran->Land->landName }}</p>
                                    <p><a class="btn btn-primary" href="/verandet/{{$veran->veran_ID}}" role="button">@lang("welcomepage.viewdetails") &raquo;</a></p>
                                </div>
                            </div>
                            <hr class="my-4">
                        </div>                    
                    @endforeach              
            @endif        
        </div> <!-- /.row -->
        
    </div> <!-- /.container -->
@endsection

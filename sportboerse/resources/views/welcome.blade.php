@extends('layouts.start')

@section('content')
    @if (Auth::check())
        
    @else
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">@lang("welcomepage.jumbotitle")</h1>
          <p>@lang("welcomepage.jumboparagraph") </p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">@lang("welcomepage.registrieren") &raquo;</a></p>
        </div>
    </div>
    @endif
 

    <div class="m-5">
        <div class="container  ">
            <h1 class="jumbotron-heading text-center ">@lang("welcomepage.listeheader")</h1>
            <!-- Example row of columns -->  
        
        </div> <!-- /container -->
    </div>

    <hr>

    @include('sportveranstaltung.list')
@endsection

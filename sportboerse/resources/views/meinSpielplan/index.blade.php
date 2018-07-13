@extends('layouts.app')

@section('content')

<div class="m-5">
        <div class="container  ">
            <h1 class="jumbotron-heading text-center ">Mein Spielplan</h1>
            <!-- Example row of columns -->  
        
        </div> <!-- /container -->
    </div>

    <hr>

    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif


<div class="container "> 
    <div class="row">      
        @if (count($allMitspieler) > 0)    
                @foreach ($allMitspieler as $allMit)
                    <p> {{ date('d.m.Y', strtotime( $allMit->Sportveranstaltung->veranVon)) }} 
                        ab 
                        {{ date('H:i', strtotime( $allMit->Sportveranstaltung->veranVon)) }} 
                        Uhr 
                        {{ $allMit->Sportveranstaltung->veranAufschrift }}
                    
                   
                    
                    @if (Auth::check())
                        
                            <form method="post" class = "form-inline" action="/meinSpielplan/{{ $allMit->mitsp_ID }}">
                                {{ csrf_field() }}
                                
                                <input name="_method" type="hidden" value="DELETE">
                                {{ method_field('DELETE') }}
                                <button  type="submit" class="btn btn-primary">Meine teilnahme stornieren</button>
                                
                            </form>
                        
                     @endif
                    </p>
                    <hr>
                      
                @endforeach              
        @endif        
    </div> <!-- /.row -->
    
</div> <!-- /.container -->

    
@endsection
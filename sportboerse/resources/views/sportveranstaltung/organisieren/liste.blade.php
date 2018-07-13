@extends('layouts.app')

@section('content')

<div class="m-5">
        <div class="container  ">
            <h1 class="jumbotron-heading text-center ">Meine Sportveranstaltungen organisieren</h1>
            <!-- Example row of columns -->  
        
        </div> <!-- /container -->
    </div>

    <hr>

    @include('sportveranstaltung.list')
    <!-- /.container -->


    @endsection

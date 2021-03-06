@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <ul class="list-group ">
            <li class="list-group-item text-center">
                <a href="{{ route('sportveranstaltung.index') }}" class="btn btn-primary" role="button">Sportveranstaltung suchen</a>
            </li>
            <li class="list-group-item text-center">
                <a href="{{ route('meinSpielplan.index') }}" class="btn btn-warning" role="button">mein Spielplan bearbeiten</a>
            </li>
            <li class="list-group-item text-center">            
                <a href="{{ route('sportveranstaltung.create') }}" class="btn btn-danger" role="button">neue Sportveranstaltung erstellen</a>
            </li>
            <li class="list-group-item text-center">            
                <a href="{{ route('sportveranstaltung.organisieren') }}" class="btn btn-success" role="button">meine Sportveranstaltungen organisieren</a>
            </li>   
        </ul>
  </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container">
<div class="card" >
    
    <ul class="list-group ">
        <li class="list-group-item text-center">
            <a href="/veransuch" class="btn btn-primary" role="button">Sportveranstaltung suchen</a>
        </li>
        <li class="list-group-item text-center">
            <a href="/bewerorg" class="btn btn-warning" role="button">meine Bewerbungen bearbeiten</a>
        </li>
        <li class="list-group-item text-center">            
            <a href="/???neuveran" class="btn btn-danger" role="button">neue Sportveranstaltung erstellen</a>
        </li>
        <li class="list-group-item text-center">            
            <a href="/meineveranorg" class="btn btn-success" role="button">meine Sportveranstaltungen organisieren</a>
        </li>   
    </ul>
  </div>
</div>

@endsection

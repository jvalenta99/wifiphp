@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Startseite</div>

                <div class="panel-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <a href='/veransuch'>Sportveranstaltung suchen</a>
                    <br>
                    <a href='/bewerorg'>meine Bewerbungen bearbeiten</a>
                    <br>
                    <a href='/meineveranorg'>meine Sportveranstaltungen organisieren</a>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

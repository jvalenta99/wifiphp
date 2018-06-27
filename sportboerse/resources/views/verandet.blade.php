@extends('layouts.start')

@section('content')

<!--
@ php(dd($detVeran->veranAufschrift))
-->
@include('sportveranstaltung.detail')

<div class="container">
    <h3>Es sind nur noch 3 Plätze frei!</h3>
    <p>   Um Teilzunehmen, muss du registriert und eingelogt sein. Registrieren link->...</p>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class = 'container' m-5>
  <div class="card">
    <div class="card-body">
      <h1 class = 'card-title text-center'>Sportveranstaltung anlegen/editieren</h1>
      
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if ( !isset($detVeran))
      <form method="post" class = "card-text" action="{{ route('sportveranstaltung.store') }}">
      @else
      <form method="post" class = "card-text" action="/sportveranstaltung/{{ $detVeran->veran_ID }}">
        
        {{ method_field('PUT') }}
      @endif
        {{csrf_field()}}
        
        <div class="form-group">
          <label for="veranAufschrift">Überschrift</label>
          <input type="text" name="veranAufschrift" class="form-control" id="veranAufschrift"  placeholder="Aufschrift" value="{{ isset($detVeran) ? $detVeran->veranAufschrift : old('veranAufschrift') }}">
        </div>
        
        <div class="form-group">
          <label for="veranDetailtext">Beschreibung</label>
          <input type="text" name="veranDetailtext" class="form-control" id="veranDetailtext"  placeholder="Detail-Text" value="{{  isset($detVeran) ? $detVeran->veranDetailtext : old('veranDetailtext') }}">
        </div>

        <div class="form-group">
            <label for="veranAdresse">Adresse</label>
            <input type="text" name="veranAdresse" class="form-control" id="veranAdresse"  placeholder="Adresse" value="{{ isset($detVeran) ? $detVeran->veranAdresse : old('veranAdresse') }}">
          </div>
        @if ( !isset($detVeran))
        <div class="form-row align-items-center">
          <div class="col-auto">
            <div class=" form-group">
              <label for="veranVon">Von</label>
              <input type="datetime-local" name="veranVon" class="form-control" id="veranVon" value="{{  isset($detVeran) ? $detVeran->veranVon: old('veranVon') }}" >
            </div>
          </div>
            <div class="col-auto">
              <div class=" form-group">
                <label for="veranBis">Bis</label>
                <input type="datetime-local" name="veranBis" class="form-control" id="veranBis"  placeholder="Detail-Text" value="{{  isset($detVeran) ? $detVeran->veranBis : old('veranBis') }}">
              </div>
            </div>
        </div>


        <div class="form-group">
          <label for="veranSportart_FK">Wähle ein Sportart: </label>
          <select name="veranSportart_FK" class="form-control" id="veranSportart_FK">
            @foreach ($allSportart as $sportart)
              <option value={{ $sportart->sportarts_ID }}
                  {{  isset($detVeran) && $sportart->sportarts_ID == $detVeran->veranSportart_FK ? ' selected' : old('veranSportart_FK') }}
                >{{ $sportart->sportartsName }}
            @endforeach   
          </select>
        </div>


        <div class="form-group">
          <label for="veranLand_FK">Wähle ein Land: </label>
          <select name="veranLand_FK" class="form-control" id="veranLand_FK">
            @foreach ($allLand as $land)
              <option value={{ $land->land_ID }}
                  {{  isset($detVeran) && $land->land_ID == $detVeran->veranLand_FK ? ' selected' : old('veranLand_FK') }}
                >{{ $land->landName }}
            @endforeach   
          </select>
        </div>
        
        <div class="form-group">
          <label for="veranStadt_FK">Wähle eine Stadt: </label>
          <select name="veranStadt_FK" class="form-control" id="veranStadt_FK">
            @foreach ($allStadt as $stadt)
              <option value={{ $stadt->stadt_ID }}
                  {{  isset($detVeran) && $stadt->stadt_ID == $detVeran->veranStadt_FK ? ' selected' : old('veranStadt_FK') }}
                >{{ $stadt->stadtName }}
            @endforeach   
          </select>
        </div>
        @endif
        <div class="form-group">
          <label for="veranMinstaerke">Minimale Spielstärke (1-10)</label>
          <input type="number" name="veranMinstaerke" class="form-control" id="veranMinstaerke"  placeholder="1" value="{{  isset($detVeran) ? $detVeran->veranMinstaerke : old('veranMinstaerke') }}" min="1" max="10">
        </div>
        
        <div class="form-group">
          <label for="veranMaxstaerke">Maximale Spielstärke (1-10)</label>
          <input type="number" name="veranMaxstaerke" class="form-control" id="veranMaxstaerke"  placeholder="10"  value="{{  isset($detVeran) ? $detVeran->veranMaxstaerke : old('veranMaxstaerke') }}" min="1" max="10">
        </div>

        <div class="form-group">
          <label for="veranMaxTeilnehmer">Maximale Anzahl der Teilnehmer </label>
          <input type="number" name="veranMaxTeilnehmer" class="form-control" id="veranMaxteilnehmer"  placeholder="max. Anzahl der Teilnehmer"  value="{{  isset($detVeran) ? $detVeran->veranMaxTeilnehmer : old('veranMaxTeilnehmer') }}" min="1" max="1500">
        </div>

        <button type="submit" class="btn btn-primary">Speichern</button>
        <br>
      </form>
    </div>
  </div>
</div>
<br>
<br>
        
@endsection
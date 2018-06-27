@extends('layouts.start')

@section('content')
<div class = 'container' m-5>
  <div class="card">
    <div class="card-body">
      <h1 class = 'card-title text-center'>neue Sportveranstaltung anlegen</h1>
      
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form method="post" class = "card-text" action="{{ route('sportveranstaltung.store') }}">
        {{csrf_field()}}
        
        <div class="form-group">
          <label for="veranAufschrift">Aufschrift</label>
          <input type="text" name="veranAufschrift" class="form-control" id="veranAufschrift"  placeholder="veranAufschrift" value="{{ old('veranAufschrift') }}">
        </div>
        
        <div class="form-group">
          <label for="veranDetailtext">Detail-Text</label>
          <input type="text" name="veranDetailtext" class="form-control" id="veranDetailtext"  placeholder="Detail-Text" value="{{ old('veranDetailtext') }}">
        </div>

        <div class="form-group">
            <label for="veranAdresse">Adresse</label>
            <input type="text" name="veranAdresse" class="form-control" id="veranAdresse"  placeholder="Adresse" value="{{ old('veranAdresse') }}">
          </div>

        <div class="form-row align-items-center">
          <div class="col-auto">
            <div class=" form-group">
              <label for="veranVon">Von</label>
              <input type="datetime-local" name="veranVon" class="form-control" id="veranVon" value="{{ old('veranVon') }}" >
            </div>
          </div>
            <div class="col-auto">
              <div class=" form-group">
                <label for="veranBis">Bis</label>
                <input type="datetime-local" name="veranBis" class="form-control" id="veranBis"  placeholder="Detail-Text" value="{{ old('veranBis') }}">
              </div>
            </div>
        </div>


        <div class="form-group">
          <label for="veranSportart_FK">Wähle ein Sportart: </label>
          <select name="veranSportart_FK" class="form-control" id="veranSportart_FK">
            @foreach ($allSportart as $sportart)
              <option value={{ $sportart->sportarts_ID }}>{{ $sportart->sportartsName }}
            @endforeach   
          </select>
        </div>


        <div class="form-group">
          <label for="veranLand_FK">Wähle ein Land: </label>
          <select name="veranLand_FK" class="form-control" id="veranLand_FK">
            @foreach ($allLand as $land)
              <option value={{ $land->land_ID }}>{{ $land->landName }}
            @endforeach   
          </select>
        </div>
        
        <div class="form-group">
          <label for="veranStadt_FK">Wähle eine Stadt: </label>
          <select name="veranStadt_FK" class="form-control" id="veranStadt_FK">
            @foreach ($allStadt as $stadt)
              <option value={{ $stadt->stadt_ID }}>{{ $stadt->stadtName }}
            @endforeach   
          </select>
        </div>

        <div class="form-group">
          <label for="veranMinstaerke">Minimale Spielstärke (1-10)</label>
          <input type="number" name="veranMinstaerke" class="form-control" id="veranMinstaerke"  placeholder="1" value="{{ old('veranMinstaerke') }}" min="1" max="10">
        </div>
        
        <div class="form-group">
          <label for="veranMaxstaerke">Maximale Spielstärke (1-10)</label>
          <input type="number" name="veranMaxstaerke" class="form-control" id="veranMaxstaerke"  placeholder="10"  value="{{ old('veranMaxstaerke') }}" min="1" max="10">
        </div>

        <button type="submit" class="btn btn-primary">Speichern</button>
      </form>
    </div>
  </div>
</div>
@endsection
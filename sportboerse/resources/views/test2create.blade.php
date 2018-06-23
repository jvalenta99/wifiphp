@extends('layouts.start')

@section('content')
<div class = 'container' m-5>
    <div class="card">
        <div class="card-body">
            <h1 class = 'card-title text-center'>neue Sportveranstaltung anlegen create blade</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="post"  class = "card-text" action="/test2">
                {{csrf_field()}}      
                <div class="form-group">
                    <label for="text1">text1</label>
                    <input type="text" name="text1" class="form-control" id="text1"  placeholder="napis text 1">
                </div>
                
                <div class="form-group">
                    <label for="unsInt">unsInt</label>
                    <input type="number" name="unsInt" class="form-control" id="unsInt" min="0" max="100000" placeholder="Detail-Text">
                </div>
        
                <div class="form-group">
                    <label for="datumCas">datumCas</label>
                    <input type="datetime-local" name="datumCas" class="form-control" id="datumCas"  placeholder="datetime?">
                </div>
            
                <button type="submit" class="btn btn-primary">Speichern</button>
            </form>
        </div>
      </div>
    </div>
@endsection

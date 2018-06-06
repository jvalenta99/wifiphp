@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Bewerbungsdetail</div>

                <div class="panel-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/bewerorg" method="get">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Bezeichnung</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Bezeichnung">
                          <small id="emailHelp" class="form-text text-muted">bla bla bemerkung</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Detailtext</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Detailtext">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">speichern</button>
                      </form>
                    
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
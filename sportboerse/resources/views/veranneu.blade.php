@extends('layouts.start')

@section('content')
<h1>neue Sportveranstaltung anlegen</h1>

<form>
        <div class="form-group">
                <label for="land">Select list:</label>
                <select class="form-control" id="land">
                  
                  
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value =3>3</option>
                  <option value =4>4</option>
                </select>
              </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Speichern</button>
      </form>
@endsection
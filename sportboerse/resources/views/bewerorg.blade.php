@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">meine Bewerbungen organisieren</div>

                <div class="panel-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <a href='/bewerdet'>25.6.2018 von 17:00 bis 19:00; Österreich; Wien; Ortdetail: ogugasse 15, 1220 wien</a>
                    <br>
                    <a href='/bewerdet'>26.6.2018 von 18:00 bis 20:00; Österreich; Wien; Ortdetail: ogugasse 15, 1220 wien</a>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

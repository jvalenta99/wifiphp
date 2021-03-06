

<div class="container "> 
        <div class="row">      
            @if (count($allVeran) > 0)    
                    @foreach ($allVeran as $veran)
                        <div class="col-md-4 ">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h5 class="text-primary">{{ date('d.m.Y', strtotime($veran->veranVon)) }} <b>@lang('welcomepage.von')</b> {{ date('H:i', strtotime($veran->veranVon)) }} <b>@lang('welcomepage.bis')</b> {{ date('H:i', strtotime($veran->veranTo)) }}</h5>
                                    <h3>{{ $veran->veranAufschrift }}</h3>
                                    <p>{{ $veran->veranDetailtext }}</p>
                                    <p>@lang('welcomepage.in') {{ $veran->Stadt->stadtName }}, {{ $veran->Land->landName }}</p>
                                    @if( $veran->veranOrganisator_FK==Auth::id())
                                    
                                    <p><a class="btn btn-primary" href="/sportveranstaltung/{{$veran->veran_ID}}/edit" role="button">@lang("welcomepage.editieren") &raquo;</a></p>
                                    @else
                                    <p><a class="btn btn-primary" href="/verandet/{{$veran->veran_ID}}" role="button">@lang("welcomepage.viewdetails") &raquo;</a></p>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4">
                        </div>                    
                    @endforeach              
            @endif        
        </div> <!-- /.row -->
        
    </div> <!-- /.container -->

    <!-- /.container -->
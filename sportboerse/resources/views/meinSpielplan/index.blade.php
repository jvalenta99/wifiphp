meinSpielplan.index servus



<div class="container "> 
    <div class="row">      
        @if (count($allMitspieler) > 0)    
                @foreach ($allMitspieler as $allMit)
                    <p> {{ date('d.m.Y', strtotime( $allMit->Sportveranstaltung->veranVon)) }} 
                        ab 
                        {{ date('H:i', strtotime( $allMit->Sportveranstaltung->veranVon)) }} 
                        Uhr 
                        {{ $allMit->auf }} {{ $allMit->Sportveranstaltung->veranAufschrift }}
                    
                    </p>
                
                      
                @endforeach              
        @endif        
    </div> <!-- /.row -->
    
</div> <!-- /.container -->
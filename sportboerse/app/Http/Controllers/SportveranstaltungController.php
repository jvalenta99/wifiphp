<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Land;
use App\Stadt;
use App\Sportart;
use App\Sportveranstaltung;
use App\Mitspieler;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


/**
 * 
 */
class SportveranstaltungController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('language');

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allVeran = Sportveranstaltung::orderBy('created_at', 'desc')->get();
        
        // Wir geben $allTasks in einem Array an die View weiter.
        return view('sportveranstaltung.suchen', [
            'allVeran' => $allVeran
        ]);

        //return view('sportveranstaltung.suchen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allLand = Land::orderBy('landName', 'asc')->get();
        $allStadt = Stadt::orderBy('stadtName', 'asc')->get();
        $allSportart = Sportart::orderBy('sportartsName', 'asc')->get();
        
        return view('sportveranstaltung.veranneu', [
            'allLand' => $allLand,
            'allStadt' => $allStadt,
            'allSportart' => $allSportart,

        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return dd(Auth::id());
        //$id = Auth::id();
        //validate data
       

        
            $this->validate($request, array(
                'veranAufschrift'=>'required|min:2|max:30',
                'veranDetailtext'=>'required|min:2|max:255',
                'veranVon' => 'required|date|after:tomorrow|before:2025-01-01',
                'veranBis' => 'required|date|after:tomorrow|before:2025-01-01',
                'veranMinstaerke'=>'required|integer|between:1,10',
                'veranMaxstaerke'=>'required|integer|between:1,10',
                'veranAdresse'=>'required|min:2|max:255',

            ));

        //store data
            $Sportveranstaltung = new Sportveranstaltung;
            $Sportveranstaltung->veranAufschrift = $request->veranAufschrift;
            $Sportveranstaltung->veranDetailtext = $request->veranDetailtext;
            $Sportveranstaltung->veranVon = Carbon::parse($request->veranVon);
            $Sportveranstaltung->veranBis = Carbon::parse($request->veranBis);
            $Sportveranstaltung->veranLand_FK = $request->veranLand_FK;
            $Sportveranstaltung->veranStadt_FK = $request->veranStadt_FK;
            $Sportveranstaltung->veranSportart_FK = $request->veranSportart_FK;
            $Sportveranstaltung->veranOrganisator_FK = Auth::id();
            $Sportveranstaltung->veranMinstaerke = $request->veranMinstaerke;
            $Sportveranstaltung->veranMaxstaerke = $request->veranMaxstaerke;
            $Sportveranstaltung->veranAdresse = $request->veranAdresse;
            
            //$Sportveranstaltung->datumCas = $request->datumCas;
            $Sportveranstaltung->save();

        //redirect to overview of sportveranstaltung
        //return view('sportveranstaltung');
        return redirect()->route('sportveranstaltung.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // in Meine Veranstaltungen organisieren
        $detVeran = Sportveranstaltung::orderBy('veranVon', 'desc')->where('veran_ID', $id)->firstOrFail();
        $detVeran->veranVon=Carbon::parse($detVeran->veranVon);
        //return dd($detVeran);
       $allMitspieler=Mitspieler::where('veran_FK',$id)->get();
       $allLand = Land::orderBy('landName', 'asc')->get();
        $allStadt = Stadt::orderBy('stadtName', 'asc')->get();
        $allSportart = Sportart::orderBy('sportartsName', 'asc')->get();
        
       return view('sportveranstaltung.veranneu', [
           'detVeran' => $detVeran,
           'allMitspieler'=>$allMitspieler,
           'allLand' => $allLand,
            'allStadt' => $allStadt,
            'allSportart' => $allSportart,


       ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // speichern was in edit ausgefüllt wurde

        //return dd($id);
        //return dd( $request);


        $this->validate($request, array(
            'veranAufschrift'=>'required|min:2|max:30',
            'veranDetailtext'=>'required|min:2|max:255',
            //'veranVon' => 'required|date|after:tomorrow|before:2025-01-01',
            //'veranBis' => 'required|date|after:tomorrow|before:2025-01-01',
            'veranMinstaerke'=>'required|integer|between:1,10',
            'veranMaxstaerke'=>'required|integer|between:1,10',
            'veranAdresse'=>'required|min:2|max:255',
            'veranMaxTeilnehmer'=>'required|integer|between:1,1500',

        ));

    //open Object
    $updateVeran = Sportveranstaltung::find($id);
    //return dd( $updateVeran->veranAufschrift);
    //napsat kod kontrolujici jestli $id patri vlastnikovi!!
    $updateVeran->fill($request->all())->save();
  
    //redirect to overview of sportveranstaltung
    //return view('sportveranstaltung');
    return redirect()->route('sportveranstaltung.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function organisieren()
    {
        
        $allVeran = Sportveranstaltung::orderBy('created_at', 'desc')->where('veranOrganisator_FK',Auth::id())->get();
        
        return view('sportveranstaltung.organisieren.liste', [
            'allVeran' => $allVeran
        ]);
        
    }

}

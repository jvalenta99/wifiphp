<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Land;
use App\Stadt;
use App\Sportart;
use App\Sportveranstaltung;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        return view('veranneu');
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
        return dd(Auth::id());
        //$id = Auth::id();
        //validate data

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
            
            //$Sportveranstaltung->datumCas = $request->datumCas;
            $Sportveranstaltung->save();

        //redirect to overview of sportveranstaltung
        return 'saved';
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
        //
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
        //
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
}

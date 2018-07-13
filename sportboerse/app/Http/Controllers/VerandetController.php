<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sportveranstaltung;
use App\Mitspieler;


class VerandetController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('language');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('verandet');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $detVeran = Sportveranstaltung::orderBy('veranVon', 'desc')->where('veran_ID', $id)->firstOrFail();
       $allMitspieler=Mitspieler::where('veran_FK',$id)->get();
       
       return view('verandet', [
           'detVeran' => $detVeran,
           'allMitspieler'=>$allMitspieler,
       ]);
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

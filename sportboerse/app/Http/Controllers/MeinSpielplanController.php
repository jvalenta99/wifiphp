<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mitspieler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class MeinSpielplanController extends Controller
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
        //Liste wo ich mitspiele

        $allMitspieler = Mitspieler::orderBy('created_at', 'desc')->where('benut_FK',Auth::id())->get();
        
        // Wir geben $allTasks in einem Array an die View weiter.
        return view('meinSpielplan.index', [
            'allMitspieler' => $allMitspieler
        ]);

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
        //return dd($request);
        //return "ahoj teilnehmer";
        $mitspieler = new Mitspieler;

        $mitspieler->benut_FK = Auth::id();
        $mitspieler->veran_FK = $request->veran_FK;
        $mitspieler->status_FK = $request->status_FK;
        $mitspieler->bewertung = "5";
        
        $mitspieler->save();

        return redirect('/meinSpielplan');
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
        try {
            Mitspieler::findOrFail($id)->delete();
        }
        catch (Exception $e) {
            return Redirect::back()->withErrors(['msg', 'The Message']);; 
        }

        return Redirect::back();
    }
}

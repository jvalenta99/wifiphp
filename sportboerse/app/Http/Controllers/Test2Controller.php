<?php

namespace App\Http\Controllers;

use App\test2;
use Illuminate\Http\Request;
Use Carbon\Carbon;


class Test2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('test2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test2create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$result= Carbon::create($request->datumCas);
        //return dd($result);
        $this->validate($request, array(
            'text1'=>'required|min:2|max:5',
            'datumCas'=>'required|date|after:tomorrow|before:2025-01-01',

        ));
        
        // speichern die daten
        // Task anlegen
        //return $request;
        //$carbon = Carbon::createFromTimestamp(1447271429);
        //$carbon = Carbon::create($request->datumCas);
        $carbon = Carbon::parse($request->datumCas);
        $test2 = new Test2;
        $test2->text1 = $request->text1;
        $test2->unsInt = $request->unsInt;
        $test2->datumCas = Carbon::parse($request->datumCas);
        $test2->save();

        return 'gespeichert!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\test2  $test2
     * @return \Illuminate\Http\Response
     */
    public function show(test2 $test2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\test2  $test2
     * @return \Illuminate\Http\Response
     */
    public function edit(test2 $test2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\test2  $test2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test2 $test2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\test2  $test2
     * @return \Illuminate\Http\Response
     */
    public function destroy(test2 $test2)
    {
        //
    }
}

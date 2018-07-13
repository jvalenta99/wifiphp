<?php

namespace App\Http\Controllers;

use App\Hersteller;
use Illuminate\Http\Request;

class HerstellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allHer = Hersteller::get();
        
        return view('hersteller.index', [
            'allHer' => $allHer
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hersteller  $hersteller
     * @return \Illuminate\Http\Response
     */
    public function show(Hersteller $hersteller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hersteller  $hersteller
     * @return \Illuminate\Http\Response
     */
    public function edit(Hersteller $hersteller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hersteller  $hersteller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hersteller $hersteller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hersteller  $hersteller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hersteller $hersteller)
    {
        //
    }
}

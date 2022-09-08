<?php

namespace App\Http\Controllers;

use App\Models\etiquette_groupe;
use App\Http\Requests\Storeetiquette_groupeRequest;
use App\Http\Requests\Updateetiquette_groupeRequest;

class EtiquetteGroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storeetiquette_groupeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeetiquette_groupeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\etiquette_groupe  $etiquette_groupe
     * @return \Illuminate\Http\Response
     */
    public function show(etiquette_groupe $etiquette_groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\etiquette_groupe  $etiquette_groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(etiquette_groupe $etiquette_groupe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateetiquette_groupeRequest  $request
     * @param  \App\Models\etiquette_groupe  $etiquette_groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Updateetiquette_groupeRequest $request, etiquette_groupe $etiquette_groupe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\etiquette_groupe  $etiquette_groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(etiquette_groupe $etiquette_groupe)
    {
        //
    }
}

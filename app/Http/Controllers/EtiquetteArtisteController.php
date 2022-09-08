<?php

namespace App\Http\Controllers;

use App\Models\etiquette_artiste;
use App\Http\Requests\Storeetiquette_artisteRequest;
use App\Http\Requests\Updateetiquette_artisteRequest;

class EtiquetteArtisteController extends Controller
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
     * @param  \App\Http\Requests\Storeetiquette_artisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeetiquette_artisteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\etiquette_artiste  $etiquette_artiste
     * @return \Illuminate\Http\Response
     */
    public function show(etiquette_artiste $etiquette_artiste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\etiquette_artiste  $etiquette_artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(etiquette_artiste $etiquette_artiste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateetiquette_artisteRequest  $request
     * @param  \App\Models\etiquette_artiste  $etiquette_artiste
     * @return \Illuminate\Http\Response
     */
    public function update(Updateetiquette_artisteRequest $request, etiquette_artiste $etiquette_artiste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\etiquette_artiste  $etiquette_artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(etiquette_artiste $etiquette_artiste)
    {
        //
    }
}

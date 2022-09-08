<?php

namespace App\Http\Controllers;

use App\Models\contient_morceau;
use App\Http\Requests\Storecontient_morceauRequest;
use App\Http\Requests\Updatecontient_morceauRequest;

class ContientMorceauController extends Controller
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
     * @param  \App\Http\Requests\Storecontient_morceauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecontient_morceauRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contient_morceau  $contient_morceau
     * @return \Illuminate\Http\Response
     */
    public function show(contient_morceau $contient_morceau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contient_morceau  $contient_morceau
     * @return \Illuminate\Http\Response
     */
    public function edit(contient_morceau $contient_morceau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecontient_morceauRequest  $request
     * @param  \App\Models\contient_morceau  $contient_morceau
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecontient_morceauRequest $request, contient_morceau $contient_morceau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contient_morceau  $contient_morceau
     * @return \Illuminate\Http\Response
     */
    public function destroy(contient_morceau $contient_morceau)
    {
        //
    }
}
